<?php

include '../connect/conn.php';


//建立PDO物件，並放入指定的相關資料

$artId = intval($_GET['memberId']); 

$sql = "SELECT 
                a.*,
                b.NAME,
                b.CURRENT_PRICE,
                b.IMG_URL_ONE,
                b.STOCK
         FROM CART as a
         JOIN PRODUCT as b
              ON a.PRODUCT_ID=b.PRODUCT_ID
              WHERE a.MEMBER_ID=:artId
               ORDER BY a.CART_ID DESC;
         ";
$statement = $pdo->prepare($sql);
$statement->bindValue(':artId',$artId);
$statement->execute();
$data = $statement->fetchAll();
$json_data = json_encode($data);
echo $json_data;
?>