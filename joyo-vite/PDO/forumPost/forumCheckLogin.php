<?php

include '../connect/conn.php';
session_start();
 //建立PDO物件，並放入指定的相關資料
   if(isset($_SESSION['member_id'])){
    $data = $_SESSION['member_id'];
    echo $data;
   }else {
    echo "is_not_login";
   }
   
?>