<?php

include '../connect/conn.php';

 //建立PDO物件，並放入指定的相關資料
 session_start();
 $data = $_SESSION['member_id'] ;
echo $data;
?>