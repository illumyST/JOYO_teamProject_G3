<?php
include '../conn.php';
// echo "test" ;
$sql = "select ar.ARTICLE_ID , ar.TITLE , ar.ARTICLE_CONTENT , ar.DATE , mb.MAIL
from  ARTICLE ar
join MEMBER mb
on ar.MEMBER_ID = mb.MEMBER_ID";
$stm = $pdo -> query($sql);
$data = $stm -> fetchAll();

$jsondata = json_encode($data);
header('Content-Type: application/json');

echo $jsondata;



?>