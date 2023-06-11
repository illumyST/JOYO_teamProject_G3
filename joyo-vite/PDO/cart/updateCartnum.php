<?php

include("../connect/conn.php");

       //---------------------------------------------------
       //接收前端來的POST的JSON資料
       $cartItem = file_get_contents('php://input');
       //將資料格式轉換
       $cartItemData = json_decode($cartItem, true);
       //取得加入購物車的商品ID
       $PRODUCT_ID = $cartItemData['PRODUCT_ID'];
       //取得會員ID 
       $MEMBER_ID = $cartItemData['member_id'];

       $amount= $cartItemData['num'];
       //測試資料有成功取得;
       echo $amount ;
       $sqlupdate=" UPDATE `CART` SET `AMOUNT` =:amount WHERE `PRODUCT_ID` = :product_id AND `MEMBER_ID` = :member_id; ";
     
       $stmt = $pdo->prepare($sqlupdate);
       $stmt->bindParam(':amount', $amount);
       $stmt->bindParam(':product_id', $PRODUCT_ID);
       $stmt->bindParam(':member_id', $MEMBER_ID);
       $stmt->execute();
       

?>