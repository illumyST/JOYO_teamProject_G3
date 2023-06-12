<?php

include "../connect/conn.php";

// 接收從前端傳來的會員編號
$data = json_decode(file_get_contents("php://input"), true);

// 取得會員編號
$memberId = $data['memberId'];

// 執行資料庫查詢
$stmt = $pdo->prepare("SELECT * FROM MEMBER WHERE MEMBER_ID = ?");
$stmt->execute([$memberId]);

// 取得查詢結果
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 檢查查詢結果
if (count($results) > 0) {
    // 找到該會員，獲取資料
    $row = $results[0];
    
    // 取得會員圖片和名稱
    $memberImg = $row['IMG_URL'];
    $memberName = $row['MEMBER_NAME'];
    
    // 傳回結果
    $responseData = array(
        'Img' => $memberImg,
        'Name' => $memberName
    );
    echo json_encode($responseData);
    // print_r($responseData);
} else {
    // 找不到該會員
    echo "找不到該會員";
}

?>