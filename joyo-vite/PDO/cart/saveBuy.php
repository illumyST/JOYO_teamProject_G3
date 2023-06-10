<?php
    include "../connect/conn.php";

    //將資料格式轉換
    $postData = file_get_contents('php://input');
    $postItemData = json_decode($postData, true);
    // print_r($postData);
    $phone = $postItemData['phone'];
    $creditNum = $postItemData['creditNum'];
    $addr = $postItemData['address'];
    $orderList  = $postItemData['orderList'];
    $memberId = $postItemData['memberID'];
    $total = $postItemData['total'];
    $buyId=$memberId.str_replace(":", "", date("H:i:s", strtotime("now")));
    //建立SQL
    $insertBuy = "INSERT INTO `BUY` (`BUY_ID`,`BUY_DATE`, `STATUS`, `TOTAL_PRICE`, `MEMBER_ID`, `ADDRESS`, `PHONE`) VALUES ($buyId,NOW(), '訂單成立', $total, $memberId, '$addr', '$phone');";
    $BuyPost = $pdo->exec($insertBuy);
    $json_data_buy = json_encode($BuyPost);
    echo $json_data_buy;
    for($i=0;$i<count($orderList);$i++){
        $amount=$orderList[$i]['AMOUNT'];
        $productId=$orderList[$i]['PRODUCT_ID'];
        $insertBuyList="INSERT INTO `BUY_DETAIL` ( `AMOUNT`, `BUY_ID`, `PRODUCT_ID`) VALUES ( '2', '$buyId', '$productId');";
        $minusStock="UPDATE `PRODUCT` SET `STOCK` = STOCK-$amount WHERE (`PRODUCT_ID` = '$productId')";
        $BuyListPost = $pdo->exec($insertBuyList);
        $minus== $pdo->exec($minusStock);
        $json_data_buylist = json_encode($BuyListPost);
        echo $json_data_buylist;
    }

?>