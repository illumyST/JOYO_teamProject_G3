<?php
$data = json_decode(file_get_contents('php://input'), true);
include '../conn.php';
print_r($data[1]);

$username_or = htmlspecialchars($data[0]["name"]);
$userid_or =  htmlspecialchars($data[0]["id"]);
$userpas_or = htmlspecialchars($data[0]["pas"]);
$username_nw = htmlspecialchars($data[1]["name"]);
$userid_nw =  htmlspecialchars($data[1]["id"]);
$userpas_nw = htmlspecialchars($data[1]["pas"]);

// echo $username_nw ;

$sql = "UPDATE BACK_ACCOUNT SET USER_NAME = ? , ACCOUNT = ? , PASSWORD = ? WHERE USER_NAME = ? && ACCOUNT = ? && PASSWORD = ? " ;
$stm = $pdo->prepare($sql);
$stm -> execute(array($username_nw,$userid_nw,$userpas_nw, $username_or,$userid_or,$userpas_or));
?>