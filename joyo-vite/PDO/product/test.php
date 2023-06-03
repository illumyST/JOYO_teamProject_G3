<?php

include '../connect/conn.php';

 //建立PDO物件，並放入指定的相關資料

 $sql = "SELECT * FROM PRODUCT WHERE NAME <> '請輸入桌遊名稱'";
 $statement = $pdo->query($sql);
 $data = $statement->fetchAll();
 $json_data = json_encode($data);
echo $json_data;
?>