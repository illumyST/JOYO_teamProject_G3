<?php
include '../connest/conn.php';
$sql = "SELECT bd.BUY_ID , pr.NAME, pr.PRICE , bd.AMOUNT  ,pr.IMG_URL_ONE
        FROM BUY_DETAIL bd
        join PRODUCT pr
        on bd.PRODUCT_ID = pr.PRODUCT_ID ;";

$stm = $pdo->query($sql);
$data = $stm -> fetchAll();

$jsondata= json_encode($data);
header("Content-Type:application/json");
echo $jsondata;

?>