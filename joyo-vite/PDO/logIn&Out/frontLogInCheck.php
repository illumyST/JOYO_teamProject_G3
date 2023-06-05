<?php
    include('../connect/conn.php');

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    $mail = $data['mail'];
    $pwd = $data['pwd'];

    $sql = "select * from MEMBER where MAIL= :mail and PASSWORD= :pwd ";

    $statement = $pdo->prepare($sql);
    $statement -> bindParam(":mail",$mail);
    $statement -> bindParam(":pwd",$pwd);
    $statement -> execute();

    $data = $statement->fetchAll();

    if(count($data)>0){
        include './saveMemberIdSession.php';
        $_SESSION['frontIsLogIn'] = true;
        
        echo 'true';
    }else{
        echo 'false';
    }
?>