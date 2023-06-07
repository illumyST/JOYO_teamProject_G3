<?php
    include "../connect/conn.php";

    //將資料格式轉換
    $postData = file_get_contents('php://input');
    $postItemData = json_decode($postData, true);
    // print_r($postData);
    
    $memberId = $postItemData['memberID'];
    
    //建立SQL
    $delSqlCart = "DELETE FROM `CART` WHERE (`MEMBER_ID` = '$memberId');";
    $dellCart = $pdo->exec($delSqlCart);

?>