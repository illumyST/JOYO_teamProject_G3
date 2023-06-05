<?php
$data = json_decode(file_get_contents('php://input'),true);
// print_r($data);
// print_r($data);
$ott = $data['ott'];
$tid = $data['tid'];
include '../connest/conn.php';
if($ott > 0){
    $sql = "UPDATE BUY SET TOTAL_PRICE = '$ott' WHERE BUY_ID = $tid ";
    $stm = $pdo->exec($sql);
}

?>