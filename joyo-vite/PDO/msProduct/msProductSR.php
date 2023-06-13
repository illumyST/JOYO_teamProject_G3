<?php
include '../connect/conn.php';
$data = json_decode(file_get_contents('php://input'),true);
$type = $data["type"]; 
$ser =  htmlspecialchars($data['sear']);
$sr = "%$ser%" ;
// echo $type ;
if($type == 1){
    $sql = "SELECT * FROM PRODUCT WHERE PRODUCT_ID like :ids and NAME <> 'value' AND NOT NAME = '請輸入桌遊名稱'" ;
}
else if($type == 2){
    $sql = "SELECT * FROM PRODUCT WHERE NAME like :ids and NAME <> 'value' AND NOT NAME = '請輸入桌遊名稱'" ;       
}else if($type == 3){
    $sql = "SELECT * FROM PRODUCT WHERE CATEGORY like :ids and NAME <> 'value' AND NOT NAME = '請輸入桌遊名稱'" ;       
}
else if($type == 4){
    $sql = "SELECT * FROM PRODUCT WHERE PRICE like :ids and NAME <> 'value' AND NOT NAME = '請輸入桌遊名稱'" ;       
}


$stm = $pdo -> prepare($sql);
$stm -> bindvalue(":ids",$sr);
$stm -> execute();
$data = $stm ->fetchAll();

$jsondata = json_encode($data);
header("Content-Type:application/json");
echo $jsondata;
?>