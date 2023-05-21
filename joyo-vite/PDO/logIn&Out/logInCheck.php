<?php
    include('../connect/conn.php');

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    $account = $data['account'];
    $pwd = $data['pwd'];


    $sql = "select * from back_account where account= :account and PASSWORD= :pwd ";

    $statement = $pdo->prepare($sql);
    $statement -> bindParam(":account",$account);
    $statement -> bindParam(":pwd",$pwd);
    $statement -> execute();

    $data = $statement->fetchAll();

    if(count($data)>0){
        session_start();
        $_SESSION['isLogIn'] = true;
        $_SESSION['account'] = $account;
        echo 1;
    }else{
        echo 0;
    }
?>