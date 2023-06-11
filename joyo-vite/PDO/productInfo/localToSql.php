<?php

include("../connect/conn.php");

       //---------------------------------------------------
       //接收前端來的POST的JSON資料
       $cartItem = file_get_contents('php://input');
       //將資料格式轉換
       $cartItemData = json_decode($cartItem, true);
       //取得加入購物車的商品ID
       $PRODUCT_ID = $cartItemData['toSql'];
       //取得會員ID 
       $MEMBER_ID = $cartItemData['member_id'];
       //測試資料有成功取得
       print_r($PRODUCT_ID) ;
       echo $MEMBER_ID ;
       //建立一個新的變數存放資料庫數據
      //  $tg = new PDO($dsn, $user, $pas);
       //查看會員購物車資料庫是否已存在相同商品
       //SQL指令，搜尋會員編號=$MEMBER_ID的購物車資料
       $sqlSelecMember = "SELECT * FROM CART where MEMBER_ID=$MEMBER_ID";
       $cartList=$pdo->query($sqlSelecMember);
       $cartListdata = $cartList->fetchAll();
       //測試用，看是否成功取得陣列資料
       //echo print_r($cartListdata, true);
       //判斷該會員是否購物車已經有商品，如果有要確認商品是否重複
       for($i=0;$i<count($PRODUCT_ID);$i++){
          $localproductId=$PRODUCT_ID[$i]['PRODUCT_ID'];
          $localamount=$PRODUCT_ID[$i]['amount'];
            if(count($cartListdata)>0){
              $sqlSelecMemberProduct = "SELECT * FROM CART where MEMBER_ID=$MEMBER_ID and PRODUCT_ID=$localproductId" ;
              $cartListProduct=$pdo->query($sqlSelecMemberProduct);
              $cartListProductdata = $cartListProduct->fetchAll();
              //資料庫有相同商品，變更商品數量+1
              if(count($cartListProductdata)>0){
                     //取得該筆購物車的ID
                     echo(123);
                     print_r($cartListProductdata[0]);
                     $cartId=$cartListProductdata[0]['CART_ID'];
                     //取得該筆購物車現行數量
                     $amount=$cartListProductdata[0]['AMOUNT'];
                     $sqlupdate=" UPDATE `CART` SET `AMOUNT` = $amount+$localamount WHERE (`CART_ID` = $cartId); ";
                     $updateRow = $pdo->exec($sqlupdate);
                     if($updateRow > 0){
                        echo "新增成功!";
                     }else{
                        echo "新增失敗!";
                     }
              //該會員購物車資料庫沒有有相同商品，新增一筆購物車商品         
              }else{
                echo(456);
                     $sqlinsert="INSERT INTO `CART` (`PRODUCT_ID`, `AMOUNT`, `MEMBER_ID`) VALUES ('$localproductId', '$localamount', '$MEMBER_ID');";
                     $insertrow = $pdo->exec($sqlinsert);
                     if($insertrow > 0){
                        echo "新增成功!";
                     }else{
                        echo "新增失敗!";
                     }  
              }
   //確認是否有同樣桌遊存在資料庫，如果沒有則新增
       //該名會員購物車沒有東西，直接加入       
            }else{
              $sqlinsert="INSERT INTO `CART` (`PRODUCT_ID`, `AMOUNT`, `MEMBER_ID`) VALUES ('$localproductId', '$localamount', '$MEMBER_ID');";
                     $insertrow = $pdo->exec($sqlinsert);
                     if($insertrow > 0){
                        echo "新增成功!";
                     }else{
                        echo "新增失敗!";
                     }  
       }
    }
       
       

?>