<?php
include '../conn.php';
    $sql = " SELECT * from PRODUCT" ;
    $stm = $pdo -> query($sql);
    $data = $stm -> fetchAll() ;
    // print_r($data);
    $jsondata = json_encode($data);
    header("Content-Type:application/json");
    echo $jsondata
?>