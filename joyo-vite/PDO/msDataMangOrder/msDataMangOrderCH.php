<?php
$data = json_decode(file_get_contents("php://input"),true);
include '../connest/conn.php';
$tid = $data["_value"]['tid'];
$num = $data["_value"]['num'];
$date = $data["_value"]['time'];

// echo $tid

if($num == 2){
    $sql = $sql = "UPDATE BUY SET SHIPPING_TIME='$date' WHERE BUY_ID = $tid " ;
    $pdo->exec($sql);
}
if ($num == 3){
    $sql = $sql = "UPDATE BUY SET DELIVERY_TIME='$date' WHERE BUY_ID = $tid " ;
    $pdo->exec($sql);
}
if ($num == 4){
    $sql = $sql = "UPDATE BUY SET COMPELETE_TIME='$date' WHERE BUY_ID = $tid " ;
    $pdo->exec($sql);
}



// if(isset($data["_value"])){
//     print_r($data["_value"]);
//     
// }
?>