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
       //測試資料有成功取得
       echo $PRODUCT_ID ;
       echo $MEMBER_ID_id ;
       //建立一個新的變數存放資料庫數據
       $tg = new PDO($dsn, $user, $pas);
       //查看會員購物車資料庫是否已存在相同商品
       //SQL指令，搜尋會員編號=$MEMBER_ID的購物車資料
       $sqlSelecMember = "SELECT * FROM CART where MEMBER_ID=$MEMBER_ID";
       $cartList=$tg->query($sqlSelecMember);
       $cartListdata = $cartList->fetchAll();
       //測試用，看是否成功取得陣列資料
       //echo print_r($cartListdata, true);
       //判斷該會員是否購物車已經有商品，如果有要確認商品是否重複
       if(count($cartListdata)>0){
              //確認是否有同樣桌遊存在資料庫，如果沒有則新增
              $sqlSelecMemberProduct = "SELECT * FROM CART where MEMBER_ID=$MEMBER_ID and PRODUCT_ID=$PRODUCT_ID" ;
              $cartListProduct=$tg->query($sqlSelecMemberProduct);
              $cartListProductdata = $cartListProduct->fetchAll();
              //資料庫有相同商品，變更商品數量+1
              if(count($cartListProductdata)>0){
                     echo $cartListProductdata[0][0];
                     //取得該筆購物車的ID
                     $cartId=$cartListProductdata[0][0];
                     //取得該筆購物車現行數量
                     $amount=$cartListProductdata[0][2];
                     $sqlupdate=" UPDATE `CART` SET `AMOUNT` = $amount+1 WHERE (`CART_ID` = $cartId); ";
                     $updateRow = $tg->exec($sqlupdate);
                     if($updateRow > 0){
                        echo "新增成功!";
                     }else{
                        echo "新增失敗!";
                     }
              //該會員購物車資料庫沒有有相同商品，新增一筆購物車商品         
              }else{
                     $sqlinsert="INSERT INTO `CART` (`PRODUCT_ID`, `AMOUNT`, `MEMBER_ID`) VALUES ('$PRODUCT_ID', '1', '$MEMBER_ID');";
                     $insertrow = $tg->exec($sqlinsert);
                     if($insertrow > 0){
                        echo "新增成功!";
                     }else{
                        echo "新增失敗!";
                     }  
              }
       //該名會員購物車沒有東西，直接加入       
       }else{
              $sqlinsert="INSERT INTO `CART` (`PRODUCT_ID`, `AMOUNT`, `MEMBER_ID`) VALUES ('$PRODUCT_ID', '1', '$MEMBER_ID');";
                     $insertrow = $tg->exec($sqlinsert);
                     if($insertrow > 0){
                        echo "新增成功!";
                     }else{
                        echo "新增失敗!";
                     }  
       }
       
       

?>