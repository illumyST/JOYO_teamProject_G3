<?php
include '../connest/conn.php';
$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'] ;
$sql = " DELETE FROM ARTICLE WHERE ARTICLE_ID = $id ";

$stm = $pdo -> exec($sql);



?>