<?php

// $host = '127.0.0.1';
// $user = 'root';
// $pas = 'password';
// $select = 'JOYO';

include '../connect/conn.php'; 


// $dsn = 'mysql:host=' . $host . ';dbname=' . $select . ";charset=utf8";

// $pdo = new PDO($dsn, $user, $pas);
// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


// 抓出所有資料
$sql = 'SELECT BUY_ID, TOTAL_PRICE, BUY_DATE, MAIL FROM BUY
LEFT JOIN MEMBER ON BUY.MEMBER_ID = MEMBER.MEMBER_ID
WHERE STATUS = "已完成"
ORDER BY BUY_DATE DESC';

$statement = $pdo->prepare($sql);
$statement->execute();
// $affectedRow = $pdo->exec($sql);
header('Content-Type: application/json');
$data = $statement->fetchAll();
if (count($data) > 0) {
    $jsonData = json_encode($data);
    echo $jsonData;
    // echo $data;
} else {
    echo "查詢失敗";
}
?>