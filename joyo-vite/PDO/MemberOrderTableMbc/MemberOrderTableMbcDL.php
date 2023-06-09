<?php
include '../connect/conn.php';
$data = json_decode(file_get_contents("php://input"),true);
session_start();
// print_r($_SESSION);
$member_ID = $_SESSION["member_id"];
// echo $member_ID ;
// echo $data;
$sql = "DELETE FROM buy WHERE MEMBER_ID = '$member_ID' and BUY_ID = '$data' " ;
$sql2 = "DELETE FROM BUY_DETAIL WHERE BUY_ID = '$data' ";

$stm2 = $pdo -> exec($sql2);
$stm = $pdo -> exec($sql);
?>