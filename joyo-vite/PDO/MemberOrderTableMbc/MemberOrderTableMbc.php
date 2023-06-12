<?php
include '../connect/conn.php';
$data1 = json_decode(file_get_contents("php://input"),true);
session_start();
// print_r($_SESSION);
$member_ID = $_SESSION["member_id"];

if($data1 == "0"){
    $sql = "SELECT o.BUY_ID , DATE(o.BUY_DATE) , o.STATUS , o.TOTAL_PRICE, o.MEMBER_ID ,DATE(o.SHIPPING_TIME), DATE(o.DELIVERY_TIME), DATE(o.COMPELETE_TIME)
            from BUY o
            join MEMBER m
            on o.MEMBER_ID = m.MEMBER_ID 
            where o.MEMBER_ID = ? ";

    $stm = $pdo -> prepare($sql);
    $stm -> execute(array($member_ID));
    $data = $stm->fetchAll();
    $jsonData = json_encode($data);
    header("Content-Type: application/json");
    echo $jsonData;
}
else{

    $sql = "SELECT  p.NAME , p.PRICE ,p.IMG_URL_ONE , b.* from PRODUCT p join
    (select bd.AMOUNT , bd.PRODUCT_ID , b.MEMBER_ID , b.BUY_ID from BUY_DETAIL bd join BUY b on b.BUY_ID = bd.BUY_ID) b
    on p.PRODUCT_ID = b.PRODUCT_ID
    where b.MEMBER_ID = ?";
       $stm = $pdo -> prepare($sql);
       $stm -> execute(array($member_ID));
       $data = $stm->fetchAll();
   
       // print_r($data);
       $jsonData = json_encode($data);
        header('Content-Type: application/json');
        echo $jsonData;
};
// echo $member_ID;


        
?>