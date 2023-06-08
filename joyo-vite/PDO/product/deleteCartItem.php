<?php

include '../connect/conn.php';

//接收前端來的POST的JSON資料
$cartItem = file_get_contents('php://input');
 //將資料格式轉換
 $cartItemData = json_decode($cartItem, true);
 //取得加入購物車的商品ID
 $PRODUCT_ID = $cartItemData['PRODUCT_ID'];
 
 //取得會員ID 
 $MEMBER_ID = $cartItemData['member_id'];
echo  $PRODUCT_ID;

$sql = "DELETE FROM CART where MEMBER_ID = $MEMBER_ID and PRODUCT_ID = $PRODUCT_ID";
$statement = $pdo->query($sql);

?>