<?php
$data = json_decode(file_get_contents('php://input'), true);
include '../connect/conn.php';
// print_r($data);
$userid = $data["name"];
$username =  $data["id"];
$userpas = $data["pas"];
// echo "123" ;
$sql = "INSERT INTO BACK_ACCOUNT(ACCOUNT, PASSWORD, USER_NAME, MGR) VALUES ('$username', '$userpas', '$userid',0)";
$stm = $pdo->exec($sql);

$swl = "SELECT BACK_ACCOUNT_ID from BACK_ACCOUNT WHERE USER_NAME = '$userid' and ACCOUNT = '$username' and PASSWORD = '$userpas'";
$stm2 = $pdo ->query($swl);
$data2 = $stm2 -> fetchAll();
// print_r($data2); 
ECHO $data2[0][0];

?>