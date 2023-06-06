<?php

include '../connect/conn.php';


//建立PDO物件，並放入指定的相關資料

$artId = intval($_GET['memberId']); 

$sql = "SELECT 
                a.*
         FROM MEMBER_CARD as a
         JOIN MEMBER as b
              ON a.MEMBER_ID=b.MEMBER_ID
              WHERE a.MEMBER_ID=:artId
               ORDER BY MEMBER_CARD_ID ASC;
         ";
$statement = $pdo->prepare($sql);
$statement->bindValue(':artId',$artId);
$statement->execute();
$data = $statement->fetchAll();
$json_data = json_encode($data);
echo $json_data;
?>