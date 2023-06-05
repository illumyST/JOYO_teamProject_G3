<?php
include '../connest/conn.php';
$data = json_decode(file_get_contents("php://input"),true);
print_r($data);
session_start();
$accid = $_SESSION['account'] ;
$sql = "UPDATE BACK_ACCOUNT SET PASSWORD = ? WHERE ACCOUNT = ? and MGR = 1 ";
$stm = $pdo -> prepare($sql);
$stm -> execute(array($data["npas"],$accid)) ;

?>