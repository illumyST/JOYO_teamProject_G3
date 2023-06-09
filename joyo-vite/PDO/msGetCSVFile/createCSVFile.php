<?php
// 直接產生csv檔案到指定路徑
include '../connect/conn.php';
$dsn = 'mysql:host=' . $host . ';dbname=' . $select . ";charset=utf8";

$pdo = new PDO($dsn, $user, $pas);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$startDate = date('Y-m-d', strtotime($_GET['startDate']));
$endDate = date('Y-m-d', strtotime($_GET['endDate']));


$sql = 'SELECT BUY_ID, TOTAL_PRICE, BUY_DATE, MAIL FROM BUY
LEFT JOIN MEMBER ON BUY.MEMBER_ID = MEMBER.MEMBER_ID
WHERE BUY_DATE BETWEEN "' . $startDate . '" AND "' . $endDate . '"
ORDER BY BUY_DATE DESC';

$statement = $pdo->prepare($sql);
$statement->execute();
$data = $statement->fetchAll();
if (count($data) > 0) {
    $outputFilePath = '../../public/csvs/'.$startDate.'_'.$endDate.'.csv';


    $output = fopen($outputFilePath, 'w');


    fputcsv($output, array_keys($data[0]));


    foreach ($data as $row) {
        fputcsv($output, $row);
    }


    fclose($output);


    echo "儲存成功";
} else {
    echo "失敗";
}
?>