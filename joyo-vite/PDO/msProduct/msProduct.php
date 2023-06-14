<?php
include '../connect/conn.php';
    $sql = "SELECT * FROM PRODUCT WHERE NAME <> 'value' AND NOT NAME = '請輸入桌遊名稱'" ;
    $stm = $pdo -> query($sql);
    $data = $stm -> fetchAll() ;
    // print_r($data);
    $jsondata = json_encode($data);
    header("Content-Type:application/json");
    echo $jsondata
?>