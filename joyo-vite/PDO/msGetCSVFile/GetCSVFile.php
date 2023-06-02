<?php

$host = '127.0.0.1';
$user = 'root';
$pas = 'password';
$select = 'JOYO';

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
    // 设置响应头，告诉浏览器将输出保存为CSV文件
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="output.csv"');

    // 輸出csv
    $output = fopen('php://output', 'w');

    // 写入CSV文件的表头
    fputcsv($output, array_keys($data[0]));

    // 逐行写入数据
    foreach ($data as $row) {
        fputcsv($output, $row);
    }

    // 关闭输出流
    fclose($output);
    exit(); // 终止脚本执行，确保只返回CSV文件内容
} else {
    echo "輸出失敗";
}
?>