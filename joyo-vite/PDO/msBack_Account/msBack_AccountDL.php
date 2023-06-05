<?php
$data = json_decode(file_get_contents('php://input'), true);
include '../connest/conn.php';
// print_r($data);
$username = $data["name"];
$userid =  $data["id"];
$userpas = $data["pas"];
// echo $userid ;

$sql = "DELETE FROM BACK_ACCOUNT WHERE ACCOUNT = '$userid' and PASSWORD = '$userpas' and USER_NAME = '$username';";

$stm= $pdo -> exec($sql);
?>