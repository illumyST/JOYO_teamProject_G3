<?php

include '../connect/conn.php';

 //建立PDO物件，並放入指定的相關資料

 $sql = "SELECT 
                a.*,
                b.MEMBER_NAME,
                b.IMG_URL
         FROM PRODUCT_COMMENT as a
         JOIN MEMBER as b
              ON a.MEMBER_ID=b.MEMBER_ID
         ";
 $statement = $pdo->query($sql);
 $data = $statement->fetchAll();
 $json_data = json_encode($data);
echo $json_data;
?>