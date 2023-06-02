<?php
include '../conn.php';
$data = json_decode(file_get_contents("php://input"),true);
$srr = htmlspecialchars($data["text"]);
$ser = "%$srr%";
$value = $data["value"];

if($value == 1){
    $sql = "SELECT * FROM member WHERE MEMBER_ID LIKE :ids ";
}
else if($value == 2){
    $sql = "SELECT * FROM member WHERE MEMBER_NAME LIKE :ids ";
}
else if($value == 3){
    $sql = "SELECT * FROM member WHERE MAIL LIKE :ids ";
}
else if($value == 4){
    if($srr == "已驗證"){ $ser = 1;}
    else if($srr == "未驗證"){ $ser = 0;}
    $sql = "SELECT * FROM member WHERE VERIFY_STATE LIKE :ids ";
}



$stm = $pdo -> prepare($sql);
$stm -> bindvalue(":ids",$ser);
$stm -> execute();
$data = $stm -> fetchAll() ;
$jsondata = json_encode($data);
header("Content-Type:application/json");
echo $jsondata;

?>