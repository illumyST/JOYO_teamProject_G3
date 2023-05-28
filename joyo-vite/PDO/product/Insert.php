<?php

include("conn.php");

       //---------------------------------------------------
       //接收前端來的POST資料
       $member_ID=($_POST["account"]);
       $psw=htmlentities($_POST["password"]);
       //先取回資料庫購物車資料
       //建立SQL
       // $sql = "INSERT INTO member(Account, PWD, CreateDate) VALUES ('王小明', 'abc123', NOW())";

       // //執行
       // $affectedRow = $pdo->exec($sql); //->與js的"."概念相同，表示下一層
       // if($affectedRow > 0){
       //        echo "新增成功!";
       // }else{
       //        echo "新增失敗!";
       // }
       echo "成功";

?>