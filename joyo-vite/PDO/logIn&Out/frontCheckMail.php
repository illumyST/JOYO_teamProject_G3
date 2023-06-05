<?php
session_start();

// test data
// include('../connect/conn.php');

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$verify_code = $data['verifyCode'];
$member_id = $_SESSION['member_id'];

// test data
// echo $_SESSION['member_id'];

$sql = "select * from MEMBER where
        MEMBER_ID = ? and
        VERRIFY_CODE = ?";

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1,$member_id);
$statement -> bindValue(2,$verify_code);
$statement -> execute();

$data = $statement->fetchAll();

if(count($data)>0){
    echo 'true';
}else{
    echo 'false';
}

?>