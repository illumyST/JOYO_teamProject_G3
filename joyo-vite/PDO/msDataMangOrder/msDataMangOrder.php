<?php
include '../conn.php';
$sql = 'select buy.BUY_ID , buy.DATE , buy.STATUS , buy.TOTAL_PRICE ,member.MAIL ,buy.SHIPPING_TIME , buy.DELIVERY_TIME, COMPELETE_TIME
from buy 
join MEMBER
on buy.MEMBER_ID = member.MEMBER_ID ' ;
$stm = $pdo -> query($sql);
$data = $stm -> fetchALL();
$jsondata = json_encode($data);
header('Content-Type:application/json');
echo $jsondata ;

?>