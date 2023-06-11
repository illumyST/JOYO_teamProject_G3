<?php

// $host = '127.0.0.1';
// $user = 'root';
// $pas = 'password';
// $select = 'JOYO';

include '../connect/conn.php'; 


// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];

// 預設顯示30天的資料
$sql = 'SELECT DATE(BUY_DATE) AS `GroupedDate`, SUM(TOTAL_PRICE) AS `TotalPrice`
FROM BUY 
WHERE DATE(BUY_DATE) >= DATE("' . $startDate . '") AND DATE(BUY_DATE) <= DATE_ADD(DATE("' . $endDate . '"), INTERVAL 1 DAY)
AND STATUS = "已完成"
GROUP BY `GroupedDate`
ORDER BY `GroupedDate` DESC
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