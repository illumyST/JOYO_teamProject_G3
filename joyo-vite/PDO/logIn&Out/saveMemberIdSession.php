<?php
include('../connect/conn.php');

$sql = "select MEMBER_ID from MEMBER where MAIL=?";
$statement = $pdo->prepare($sql);
$statement -> bindParam(1,$mail);

// test data
// $statement -> bindValue(1,'illumy.design@gmail.com');

$statement -> execute();
$data = $statement->fetchAll();
session_start();

// 存MEMBER_ID
$_SESSION['member_id'] = $data[0][0];

// test data
// echo $_SESSION['member_id'];

// // test data
// session_start();
// print_r($_SESSION) ;
?>