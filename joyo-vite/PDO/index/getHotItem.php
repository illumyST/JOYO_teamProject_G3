<?php

include '../connect/conn.php';

 //建立PDO物件，並放入指定的相關資料
 $tg = new PDO($dsn, $db_user, $db_pass);
 
//利用商品ID做群組，並將銷售數量進行總和排序，篩選出前三高的資料，並與PRODUCT做JOIN取得商品名稱、售價以及圖片
 $sqlSelRank = "SELECT 
                    B.PRODUCT_ID,
                    P.NAME,
                    P.PRICE,
                    P.IMG_URL,
                    P.CATEGORY,
                    SUM(B.AMOUNT)
                from 
                    BUY_DETAIL as B
                    join PRODUCT as P
                        on B.PRODUCT_ID=P.PRODUCT_ID
                group by
                    PRODUCT_ID
                order by SUM(AMOUNT) desc
                limit 3;";
 $statement = $tg->query($sqlSelRank);
 $data = $statement->fetchAll();
 $json_data = json_encode($data);
echo $json_data;
?>