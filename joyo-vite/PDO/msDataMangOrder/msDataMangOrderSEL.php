<?php
include '../conn.php';
$data = json_decode(file_get_contents('php://input'),true);
$ser = htmlspecialchars($data["text"]);
$value = $data["value"];
$seer = "%$ser%" ;
// echo $value ;

if($value == 1){
    $sql = "SELECT buy.BUY_ID , buy.BUY_DATE , buy.STATUS , buy.TOTAL_PRICE ,member.MAIL ,buy.SHIPPING_TIME , buy.DELIVERY_TIME, buy.COMPELETE_TIME
    from buy 
    join MEMBER
    on buy.MEMBER_ID = member.MEMBER_ID 
    where BUY_ID like :ids " ;
}
else if($value == 2){
    $sql = "SELECT buy.BUY_ID , buy.BUY_DATE , buy.STATUS , buy.TOTAL_PRICE ,member.MAIL ,buy.SHIPPING_TIME , buy.DELIVERY_TIME, buy.COMPELETE_TIME
    from buy 
    join MEMBER
    on buy.MEMBER_ID = member.MEMBER_ID 
    where MAIL like :ids " ;
}
else if($value == 3){
    $sql = "SELECT buy.BUY_ID , buy.BUY_DATE , buy.STATUS , buy.TOTAL_PRICE ,member.MAIL ,buy.SHIPPING_TIME , buy.DELIVERY_TIME, buy.COMPELETE_TIME
    from buy 
    join MEMBER
    on buy.MEMBER_ID = member.MEMBER_ID 
    where TOTAL_PRICE like :ids  " ;   
}
else if($value == 4){
    // $sql = "SELECT buy.BUY_ID , buy.BUY_DATE , buy.STATUS , buy.TOTAL_PRICE ,member.MAIL ,buy.SHIPPING_TIME , buy.DELIVERY_TIME, buy.COMPELETE_TIME
    // from buy 
    // join MEMBER
    // on buy.MEMBER_ID = member.MEMBER_ID 
    // where TOTAL_PRICE like :ids " ;  
}
else if($value == 5){
    $sql = "SELECT buy.BUY_ID , buy.BUY_DATE , buy.STATUS , buy.TOTAL_PRICE ,member.MAIL ,buy.SHIPPING_TIME , buy.DELIVERY_TIME, buy.COMPELETE_TIME
    from buy 
    join MEMBER
    on buy.MEMBER_ID = member.MEMBER_ID 
    where STATUS like :ids " ;  
}
else if($value == 6){
    // $sql = "SELECT buy.BUY_ID , buy.BUY_DATE , buy.STATUS , buy.TOTAL_PRICE ,member.MAIL ,buy.SHIPPING_TIME , buy.DELIVERY_TIME, buy.COMPELETE_TIME
    // from buy 
    // join MEMBER
    // on buy.MEMBER_ID = member.MEMBER_ID 
    // where TOTAL_PRICE like :ids " ;  
}

$stm = $pdo -> prepare($sql);
$stm -> bindvalue(":ids",$seer);
$stm -> execute();
$data = $stm ->fetchAll();

$jsonData = json_encode($data);

header('Content-Type: application/json');
echo $jsonData;
?>