<?php
include ('../connect/conn.php');

$dsn = 'mysql:host=' . $host . ';dbname=' . $select . ";charset=utf8";

$pdo = new PDO($dsn, $user, $pas);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];


$sql = 'SELECT BUY_ID, TOTAL_PRICE,DATE, MAIL FROM BUY
LEFT JOIN MEMBER ON BUY.MEMBER_ID = MEMBER.MEMBER_ID
WHERE DATE BETWEEN "' . $startDate . '" AND "' . $endDate . '"
ORDER BY DATE DESC';

$statement = $pdo->prepare($sql);
$statement->execute();
// $affectedRow = $pdo->exec($sql);
// header('Content-Type: application/json');
$data = $statement->fetchAll();
if (count($data) > 0) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="output.csv"');

    // 輸出csv
    $output = fopen('php://output', 'w');


    fputcsv($output, array_keys($data[0]));


    foreach ($data as $row) {
        fputcsv($output, $row);
    }


    fclose($output);
    exit();
} else {
    echo "輸出失敗";
}
?>