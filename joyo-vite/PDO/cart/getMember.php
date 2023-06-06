<?php

include '../connect/conn.php';


//建立PDO物件，並放入指定的相關資料

$artId = intval($_GET['memberId']); 

$sql = "SELECT 
         MEMBER_NAME,
         PHONE,
         ADDR_CITY,
         ADDR_DIST,
         ADDR_DETAIL
         FROM MEMBER
              WHERE MEMBER_ID=:artId
         ";
$statement = $pdo->prepare($sql);
$statement->bindValue(':artId',$artId);
$statement->execute();
$data = $statement->fetch();
$json_data = json_encode($data);
echo $json_data;
?>