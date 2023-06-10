<?php
include '../connect/conn.php';
$sql = 'select buy.BUY_ID , DATE(buy.BUY_DATE) , buy.STATUS , buy.TOTAL_PRICE ,member.MAIL ,DATE(buy.SHIPPING_TIME) , DATE(buy.DELIVERY_TIME), DATE(buy.COMPELETE_TIME)
from buy 
join MEMBER
on buy.MEMBER_ID = member.MEMBER_ID ;' ;
$stm = $pdo -> query($sql);
$data = $stm -> fetchALL();
$jsondata = json_encode($data);
header('Content-Type:application/json');
echo $jsondata ;

?>