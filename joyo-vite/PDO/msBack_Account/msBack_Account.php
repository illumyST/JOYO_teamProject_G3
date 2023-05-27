<?php
include '../conn.php';
$sql = "SELECT * FROM BACK_ACCOUNT WHERE MGR = 0";
$stm = $pdo -> prepare($sql); 
$stm -> execute();
$data = $stm -> fetchAll();
// print_r($data);

$jsonData = json_encode($data);

header('Content-Type: application/json');
echo $jsonData;
    
?>