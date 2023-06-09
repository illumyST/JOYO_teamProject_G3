<?php

include("../connect/conn.php");

       //---------------------------------------------------
       //接收前端來的POST的JSON資料
       $cardItem = file_get_contents('php://input');
       //將資料格式轉換
       $cardItemData = json_decode($cardItem, true);
       print_r($cardItemData) ;
       //取得會員ID
       $MEMBER_ID = $cardItemData["memberId"];
       //取得會員ID 
       $cardInfor = $cardItemData["cardInfor"];
       $cardnumber=$cardInfor["number"];
       $cardName=$cardInfor["cardName"];
       //測試資料有成功取得
       
    //    echo $MEMBER_ID ;
       //建立一個新的變數存放資料庫數據
       //查看會員購物車資料庫是否已存在相同商品
       //SQL指令，搜尋會員編號=$MEMBER_ID的購物車資料
       $sqlSelecMember = "INSERT INTO `MEMBER_CARD` (`NAME`, `CARD_NUMBER`, `MEMBER_ID`) VALUES (:value1, :value2, '$MEMBER_ID ')";
       $cardinsert=$pdo->prepare($sqlSelecMember);
       $cardinsert->bindParam(':value1', $cardName);
       $cardinsert->bindParam(':value2', $cardnumber);
       $cardinsert->execute();
?>