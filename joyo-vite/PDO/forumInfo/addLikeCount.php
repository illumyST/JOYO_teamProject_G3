<?php
// 引入資料庫連接設定
include '../connect/conn.php';

// 取得前端傳送的文章ID和會員ID
$likeData = file_get_contents('php://input');
$likeItemData = json_decode($likeData, true);
$articleId = isset($likeItemData['artId']) ? $likeItemData['artId'] : null;
$memberId = isset($likeItemData['memberId']) ? $likeItemData['memberId'] : null;

// 檢查是否已經點過愛心
if ($articleId !== null && $memberId !== null) {
    // 檢查是否已經點過愛心
    $selectlike = "SELECT * FROM ARTICLE_LIKE WHERE ARTICLE_ID = :articleId AND MEMBER_ID = :memberId";
    $stmt = $pdo->prepare($selectlike);
    $stmt->bindParam(':articleId', $articleId);
    $stmt->bindParam(':memberId', $memberId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // 會員已經點過愛心，不進行任何操作
        $response = array(
            'success' => false,
            'message' => '已經點過愛心了'
        );
    } else {
        // 會員尚未點過愛心，將資料插入 ARTICLE_LIKE 表格
        $insertlike = "INSERT INTO ARTICLE_LIKE (ARTICLE_ID, MEMBER_ID) VALUES (:articleId, :memberId)";
        $insertResult = $pdo->prepare($insertlike);
        $insertResult->bindParam(':articleId', $articleId);
        $insertResult->bindParam(':memberId', $memberId);
        $insertResult->execute();

        if ($insertResult) {
            // 更新 ARTICLE 表格中的 LIKEARTICLE 欄位
            $getLikeCount = "SELECT LIKEARTICLE FROM ARTICLE WHERE ARTICLE_ID = :articleId";
            $likeCountResult = $pdo->prepare($getLikeCount);
            $likeCountResult->bindParam(':articleId', $articleId);
            $likeCountResult->execute();

            if ($likeCountResult->rowCount() > 0) {
                $currentLikeCount = $likeCountResult->fetchColumn();

                $uplike = "UPDATE ARTICLE SET LIKEARTICLE = :newLikeCount WHERE ARTICLE_ID = :articleId";
                $updateResult = $pdo->prepare($uplike);
                $newLikeCount = $currentLikeCount + 1;
                $updateResult->bindParam(':newLikeCount', $newLikeCount);
                $updateResult->bindParam(':articleId', $articleId);
                $updateResult->execute();

                if ($updateResult) {
                    $response = array(
                        'success' => true,
                        'message' => '點愛心成功'
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
                    'message' => '無法獲取當前愛心數量'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => '插入愛心資料失敗'
            );
        }
    }
    // 回傳結果給前端
    echo json_encode($response);
}
?>
