<?php

 //MySQL相關資訊
 $db_host = "127.0.0.1";
 $db_user = "root";
 $db_pass = "password";
 $db_select = "TG";

 //建立資料庫連線物件
 $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";

 //建立PDO物件，並放入指定的相關資料
 $tg = new PDO($dsn, $db_user, $db_pass);

 $sql = "SELECT * FROM PRODUCT";
 $statement = $tg->query($sql);
 $data = $statement->fetchAll();
 $json_data = json_encode($data);
echo $json_data;
?>