<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;

require __DIR__ . '/vendor/autoload.php';

$factory = new Factory([
    'hashKey' => '5294y06JbISpM5x9',
    'hashIv' => 'v77hoKGq4kWxNNIS',
]);
$autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');
$sendData = file_get_contents('php://input');
$postItemData = json_decode($sendData, true);
$TotalAmount=$postItemData['total'];
$buyId=$postItemData['memberID'];
$ItemName=$postItemData['orderItem'];
$input = [
    'MerchantID' => '2000132',
    'MerchantTradeNo' => $buyId . time(),
    'MerchantTradeDate' => date('Y/m/d H:i:s'),
    'PaymentType' => 'aio',
    'TotalAmount' => $TotalAmount,
    'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
    'ItemName' => $ItemName,
    'ChoosePayment' => 'ALL',
    'EncryptType' => 1,
    // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
    'ReturnURL' => 'http://localhost:80/G3/joyo-vite/PDO/pay_test/checkoutresponse.php',
    //打包用
    // 'ReturnURL' => 'https://tibamef2e.com/thd101/g3/joyo-vite/PDO/checkoutresponse.php',
    'ClientBackURL' =>'http://localhost:5173/#/cartFinish/',
    //打包適用
    // 'ClientBackURL' =>'http://localhost:80/#/cartFinish/',
    
];
$action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

echo $autoSubmitFormService->generate($input, $action);
?>