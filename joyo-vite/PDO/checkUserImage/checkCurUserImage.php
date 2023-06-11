<?php

include '../connect/conn.php';
$userId = $_GET["userId"]; 
$sql = "SELECT IMG_URL FROM MEMBER WHERE MEMBER_ID = $userId"; 

$statement = $pdo->prepare($sql);
$statement->execute();
// $affectedRow = $pdo->exec($sql);
// header('Content-Type: application/json');
$data = $statement->fetchAll();
if (count($data) > 0) {
    $jsonData = json_encode($data);
    echo $jsonData;
    // echo $data;
} else {
    echo "查詢失敗";
}
?>