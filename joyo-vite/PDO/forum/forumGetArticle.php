<?php

include '../connect/conn.php';

 //建立PDO物件，並放入指定的相關資料

 $sql = "SELECT a.* ,
                DATE(a.ARTICLE_DATE) as NEWDATE,
                b.MEMBER_NAME,
                b.IMG_URL,
                c.PRODUCT_ID,
                c.CATEGORY,
                c.MIN_PLAYER,
                c.MAX_PLAYER,
        IFNULL(COUNT(d.ARTICLE_ID), 0) as COMMENT_NUM
        FROM 
                ARTICLE as a
        JOIN
                MEMBER as b
                ON a.MEMBER_ID = b.MEMBER_ID
        JOIN
                PRODUCT as c
                ON a.GAME_NAME = c.NAME
        LEFT JOIN
                ARTICLE_COMMENT as d
                ON a.ARTICLE_ID=d.ARTICLE_ID
        GROUP BY a.ARTICLE_ID, a.MEMBER_ID, a.GAME_NAME, NEWDATE, b.MEMBER_NAME, c.PRODUCT_ID, c.CATEGORY, c.MIN_PLAYER, c.MAX_PLAYER
        order by a.ARTICLE_DATE desc;";
 $statement = $pdo->query($sql);
 $data = $statement->fetchAll();
 $json_data = json_encode($data);
echo $json_data;
?>