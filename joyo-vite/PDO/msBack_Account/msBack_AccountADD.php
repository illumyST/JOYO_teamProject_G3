<?php
$data = json_decode(file_get_contents('php://input'), true);
include '../conn.php';
// print_r($data);
$userid = $data["name"];
$username =  $data["id"];
$userpas = $data["pas"];
// echo "123" ;
$sql = "INSERT INTO BACK_ACCOUNT(ACCOUNT, PASSWORD, USER_NAME, MGR) VALUES ('$username', '$userpas', '$userid',0)";
$stm = $pdo->exec($sql);

?>