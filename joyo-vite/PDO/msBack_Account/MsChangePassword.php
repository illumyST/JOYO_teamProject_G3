<?php
include '../connect/conn.php';
$data = json_decode(file_get_contents("php://input"),true);
// print_r($data);
session_start();
$accid = $_SESSION['account'] ;
// $old = $_SESSION[];
$sql = "SELECT PASSWORD from BACK_ACCOUNT WHERE ACCOUNT = '$accid'";
$stt = $pdo -> query($sql);
$datt = $stt -> fetchAll();
// echo $datt[0][0];
// echo $data["npas"];
// echo $data["pas"];
if($datt[0][0] != $data["pas"] || $datt[0][0] == $data["npas"]){
    echo "更新失敗" ;
}else if($datt[0][0] == $data["pas"] && $datt[0][0] !=$data["npas"] ){
    $sql = "UPDATE BACK_ACCOUNT SET PASSWORD = ? WHERE ACCOUNT = ? ";
    $stm = $pdo -> prepare($sql);
    $result = $stm->execute(array($data["npas"], $accid));
    $affectedRows = $stm->rowCount();
    if ($affectedRows > 0) {
        echo "更新成功";
    } else {
        echo "更新失敗";
    }
}


?>