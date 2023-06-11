<?php
include '../connect/conn.php';
$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'] ;
// echo $id ;
$sql = " DELETE FROM ARTICLE_COMMENT WHERE ARTICLE_ID = '$id' ";
$sql2 = " DELETE FROM ARTICLE WHERE ARTICLE_ID = '$id' ";

$stm = $pdo -> exec($sql);
$stm2 = $pdo -> exec($sql2);


?>