<?php
    include('../connect/conn.php');

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    $account = $data['account'];
    $pwd = $data['pwd'];


    $sql = "SELECT * FROM back_account WHERE ACCOUNT= :account and PASSWORD= :pwd ";

    $statement = $pdo->prepare($sql);
    $statement -> bindParam(":account",$account);
    $statement -> bindParam(":pwd",$pwd);
    $statement -> execute();

    $data = $statement->fetchAll();


    if(count($data)>0){
        session_start();
        $_SESSION['isLogIn'] = true;
        $_SESSION['account'] = $account;
        $_SESSION['mgr'] = $data[0]["MGR"];
        echo 'true';
    }else{
        echo 'false';
    }
?>