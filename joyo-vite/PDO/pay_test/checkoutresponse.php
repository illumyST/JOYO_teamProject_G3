<?php
include "../connect/conn.php";
use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Response\VerifiedArrayResponse;

require __DIR__ . '/vendor/autoload.php';

$factory = new Factory([
    'hashKey' => '5294y06JbISpM5x9',
    'hashIv' => 'v77hoKGq4kWxNNIS',
]);
$checkoutResponse = $factory->create(VerifiedArrayResponse::class);

if ( $_POST['RtnCode'] =='1' ){ 
    //將前台暫存的購買資訊抓進資料庫中，成立訂單
    $verificationResult = $checkoutResponse->verify($_POST);
    
    // 将前台暂存的购买信息抓进数据库中，成立订单
    if ($verificationResult->isSuccess()) {
        $BUY_ID = $_POST['MerchantTradeNo'];
        $updatesql = "UPDATE `JOYO`.`BUY` SET `STATUS` = '訂單成立' WHERE (`BUY_ID` = '$BUY_ID');";
        $updat = $pdo->exec($updatesql);
    }
    echo '1';
}
?>
