<?php

include("../connect/conn.php");

       //---------------------------------------------------
       //接收前端來的POST的JSON資料
       $postItem = file_get_contents('php://input');
       //將資料格式轉換
       $newMemberData = json_decode($postItem, true);
       //取得卡片ID
       $new_psw = $newMemberData["newpwd"];
       //取得會員ID 
       $memberid = $newMemberData["memberId"];
       //測試資料有成功取得
       
       echo $memberid ;
       //建立一個新的變數存放資料庫數據
       //查看會員購物車資料庫是否已存在相同商品
       //SQL指令，搜尋會員編號=$MEMBER_ID的購物車資料
       $sqlupdatePsw = "UPDATE `MEMBER` SET `PASSWORD` = :value1 WHERE (`MEMBER_ID` = $memberid);";
       $insertPsw=$pdo->prepare($sqlupdatePsw);
       $insertPsw->bindParam(':value1', $new_psw);
       $insertPsw->execute();
       session_start();
       session_unset();
       session_destroy();
?>