<?php

// $host = '127.0.0.1';
// $user = 'root';
// $pas = 'password';
// $select = 'JOYO';

include '../connect/conn.php';

// $dsn = 'mysql:host=' . $host . ';dbname=' . $select . ";charset=utf8";

// $pdo = new PDO($dsn, $user, $pas);
// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// 預設顯示30筆資料
$sql = 'SELECT DATE(BUY_DATE) AS `GroupedDate`, SUM(TOTAL_PRICE) AS `TotalPrice`
FROM BUY 
WHERE STATUS = "已完成"
GROUP BY DATE(BUY_DATE)
ORDER BY DATE(BUY_DATE) DESC
LIMIT 30';

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