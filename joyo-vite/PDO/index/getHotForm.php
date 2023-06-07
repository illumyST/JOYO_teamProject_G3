<?php

include '../connect/conn.php';

 //建立PDO物件，並放入指定的相關資料
 
//利用商品ID做群組，並將銷售數量進行總和排序，篩選出前三高的資料，並與PRODUCT做JOIN取得商品名稱、售價以及圖片
 $sqlSelRank = "SELECT a.*
                    from 
                    ARTICLE as a
                left join ARTICLE_COMMENT as b
                    on a.ARTICLE_ID=b.ARTICLE_ID
                    group by
                        a.ARTICLE_ID
                order by COUNT(b.ARTICLE_ID) desc
                limit 5;";
 $statement = $pdo->query($sqlSelRank);
 $data = $statement->fetchAll();
 $json_data = json_encode($data);
echo $json_data;
?>