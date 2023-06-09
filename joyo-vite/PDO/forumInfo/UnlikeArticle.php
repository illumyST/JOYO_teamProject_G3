<?php
// 引入資料庫連接設定
include '../connect/conn.php';

// 取得前端傳送的文章ID和會員ID
$likeData = file_get_contents('php://input');
$likeItemData = json_decode($likeData, true);
$articleId = isset($likeItemData['artId']) ? $likeItemData['artId'] : null;
$memberId = isset($likeItemData['memberId']) ? $likeItemData['memberId'] : null;

if ($articleId !== null && $memberId !== null) {
    // 檢查是否已經點過愛心
    $unlike= "SELECT * FROM ARTICLE_LIKE WHERE ARTICLE_ID = :articleId AND MEMBER_ID = :memberId";
    $stmt = $pdo->prepare($unlike);
    $stmt->bindParam(':articleId', $articleId);
    $stmt->bindParam(':memberId', $memberId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // 會員已經點過愛心，執行取消點選操作
        $deletelike = "DELETE FROM ARTICLE_LIKE WHERE ARTICLE_ID = :articleId AND MEMBER_ID = :memberId";
        $deleteResult = $pdo->prepare($deletelike);
        $deleteResult->bindParam(':articleId', $articleId);
        $deleteResult->bindParam(':memberId', $memberId);
        $deleteResult->execute();

        if ($deleteResult) {
            // 更新 ARTICLE 表格中的 LIKEARTICLE 欄位
            $updateLike = "UPDATE ARTICLE SET LIKEARTICLE = LIKEARTICLE - 1 WHERE ARTICLE_ID = :articleId";
            $updateResult = $pdo->prepare($updateLike);
            $updateResult->bindParam(':articleId', $articleId);
            $updateResult->execute();

            if ($updateResult) {
                $response = array(
                    'success' => true,
                    'message' => '取消愛心成功'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => '更新愛心數量失敗'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => '刪除愛心資料失敗'
            );
        }
    } else {
        // 會員尚未點過愛心，不進行任何操作
        $response = array(
            'success' => false,
            'message' => '尚未點選愛心'
        );
    }
    // 回傳結果給前端
    echo json_encode($response);
}


?>