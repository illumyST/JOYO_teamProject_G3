<?php

include '../connect/conn.php';

 //建立PDO物件，並放入指定的相關資料
 $tg = new PDO($dsn, $db_user, $db_pass);

 $sql = "SELECT * FROM PRODUCT";
 $statement = $tg->query($sql);
 $data = $statement->fetchAll();
 $json_data = json_encode($data);
echo $json_data;
?>