<?php

include '../connect/conn.php';

 //建立PDO物件，並放入指定的相關資料
 $memberId = intval($_GET['memberId']); 
 $sql = "SELECT * FROM MEMBER_CARD WHERE MEMBER_ID =$memberId";
 $statement = $pdo->query($sql);
 $data = $statement->fetchAll();
 $json_data = json_encode($data);
echo  $json_data;
?>