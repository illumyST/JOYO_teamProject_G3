<?php
include '../connect/conn.php';
$data = json_decode(file_get_contents('php://input'),true);
print_r($data) ;
$sql = " DELETE FROM  PRODUCT WHERE PRODUCT_ID = $data " ;
$stm = $pdo -> exec($sql);
?>