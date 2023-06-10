<?php
// 引入資料庫連接設定
include '../connect/conn.php';

$artId = $_GET['artId'];
$memberId = $_GET['memberId'];

// 執行查詢
$stmt = $pdo->prepare("SELECT * FROM ARTICLE_LIKE WHERE ARTICLE_ID = :artId AND MEMBER_ID = :memberId");
$stmt->bindValue(':artId', $artId);
$stmt->bindValue(':memberId', $memberId);
// var_dump($artId, $memberId);
$stmt->execute();
$likedArticles = $stmt->fetchAll();

    if ($likedArticles) {
        // 會員已經點過讚
        $response = 1;
    } else {
        // 會員尚未點過讚
        $response = 0;
    }

// 返回結果
header('Content-Type: application/json');
// echo json_encode($likedArticles);
echo ($response);
?>
