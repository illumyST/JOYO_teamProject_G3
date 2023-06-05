<?php
include '../connest/conn.php';

$sql = "SELECT * FROM  MEMBER";
$stm = $pdo -> query($sql);
$data = $stm -> fetchAll();

// print_r($data)

    $jsonData = json_encode($data);

    header('Content-Type: application/json');
    echo $jsonData;

?>