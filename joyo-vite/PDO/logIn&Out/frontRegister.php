<?php
    include('../connect/conn.php');

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    $member_name = $data['member_name'];
    $mail = $data['mail'];
    $password = $data['password'];

    $sql = "insert into MEMBER(MEMBER_NAME,MAIL,PASSWORD,VERITY_STATE)
            values( ?, ?, ?,0)" ;
    
    $statement = $pdo->prepare($sql);
    $statement -> bindParam(1,$member_name);
    $statement -> bindParam(2,$mail);
    $statement -> bindParam(3,$password);
    $statement -> execute();
    // 是否要 insert verify code / state

    $affectedRow =  $statement -> fetchAll();

    if($affectedRow > 0){
        echo 'true';
    }else{
        echo 'false';
    };



?>