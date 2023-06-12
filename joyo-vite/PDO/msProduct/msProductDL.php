<?php
include '../connect/conn.php';
$data = json_decode(file_get_contents('php://input'),true);
// print_r($data) ;
$id = $data["pronum"];
$name = $data["proname"];

$sq1 = "DELETE FROM article_comment
WHERE ARTICLE_ID in (SELECT ARTICLE_ID FROM ARTICLE WHERE GAME_NAME ='$name')" ;

$sq11 = "DELETE FROM ARTICLE_like
WHERE ARTICLE_ID in (SELECT ARTICLE_ID FROM ARTICLE WHERE GAME_NAME ='$name')";

$sq2 = "DELETE FROM ARTICLE WHERE GAME_NAME = '$name'" ;

$sq3 = "DELETE from CART where PRODUCT_ID = '$id'";

$sq4 = "DELETE FROM  PRODUCT_COMMENT WHERE PRODUCT_ID = '$id'" ;

$sq5 = "DELETE FROM  PRODUCT WHERE PRODUCT_ID = '$id'";

$sq6 = "DELETE FROM BUY_DETAIL WHERE PRODUCT_ID = '$id'";


$pdo -> exec($sq1);
$pdo -> exec($sq11);
$pdo -> exec($sq2);
$pdo -> exec($sq3);
$pdo -> exec($sq6);
$pdo -> exec($sq4);
$pdo -> exec($sq5);
?>