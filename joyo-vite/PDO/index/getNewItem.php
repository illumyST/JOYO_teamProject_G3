<?php

include '../connect/conn.php';

 //建立PDO物件，並放入指定的相關資料
//利用商品ID做群組，並將銷售數量進行總和排序，篩選出前三高的資料，並與PRODUCT做JOIN取得商品名稱、售價以及圖片
 $sqlSelfRank = "SELECT 
                   *
                from 
                    PRODUCT
                    WHERE NAME <> '請輸入桌遊名稱'
                order by PRODUCT_DATE desc
                limit 4;";
 $statement = $pdo->query($sqlSelfRank);
 $data = $statement->fetchAll();
 $json_data = json_encode($data);
echo $json_data;
?>