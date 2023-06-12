<?php
session_start();
include('../connect/conn.php');

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

$affectedRow = $statement->fetchAll();

if(count($affectedRow)>0){

    // 驗證碼輸入正確 VERIFY_STATE = 1;
    //              VERIFY_CODE = null
    $sql = "update MEMBER
	        set VERIFY_STATE = 1,
                VERRIFY_CODE = null
            where MEMBER_ID = $member_id;";
    $statement = $pdo -> prepare($sql);
    $statement -> execute();

    echo 'true';
}else{
    echo 'false';
}

?>