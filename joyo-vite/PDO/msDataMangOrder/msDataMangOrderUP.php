<?php
// echo "test123";
include '../connest/conn.php';
$data = json_decode(file_get_contents('php://input'), true);
// print_r($data['_value']);

$tid = $data['_value']['tid'];
$two = ($data['_value']['SHIPPING_TIME'] != "")?$data['_value']['SHIPPING_TIME']:null;
$the = ($data['_value']['DELIVERY_TIME'] != "")?$data['_value']['DELIVERY_TIME']:null;
$four = ($data['_value']['COMPELETE_TIME'] != "" )?$data['_value']['COMPELETE_TIME']:null;
$status = $data['_value']['STATUS']; 



echo $two ;

$sql = "UPDATE BUY SET STATUS = '$status', SHIPPING_TIME=?, DELIVERY_TIME=?, COMPELETE_TIME=? WHERE BUY_ID = $tid " ;

$stm = $pdo->prepare($sql);
// $stm -> bindvalue (':two',$two);
$stm -> execute(array($two,$the,$four));
?>