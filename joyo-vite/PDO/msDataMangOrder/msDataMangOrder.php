<?php
include '../connect/conn.php';
$sql = 'select BUY.BUY_ID , DATE(BUY.BUY_DATE) , BUY.STATUS , BUY.TOTAL_PRICE ,MEMBER.MAIL ,DATE(BUY.SHIPPING_TIME) , DATE(BUY.DELIVERY_TIME), DATE(BUY.COMPELETE_TIME)
from BUY 
join MEMBER
on BUY.MEMBER_ID = MEMBER.MEMBER_ID ;' ;
$stm = $pdo -> query($sql);
$data = $stm -> fetchALL();
$jsondata = json_encode($data);
header('Content-Type:application/json');
echo $jsondata ;

?>