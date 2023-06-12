<?php

include '../connect/conn.php';


//建立PDO物件，並放入指定的相關資料

$artId = $_GET['artId']; 

$sql = "SELECT 
                a.*,
                b.MEMBER_NAME,
                b.IMG_URL,
                DATE(a.ARTICLE_COMMENT_DATE)
         FROM ARTICLE_COMMENT as a
         JOIN MEMBER as b
              ON a.MEMBER_ID=b.MEMBER_ID
               HAVING a.ARTICLE_ID = :artId
               ORDER BY a.ARTICLE_COMMENT_DATE DESC
         ";

$statement = $pdo->prepare($sql);
$statement->bindValue(':artId', $artId);
$statement->execute();

$data = $statement->fetchAll();
$json_data = json_encode($data);

echo $json_data;
?>