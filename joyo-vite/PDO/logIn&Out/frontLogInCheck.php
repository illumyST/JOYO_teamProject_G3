<?php
    include('../connect/conn.php');

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    $mail = $data['mail'];
    $pwd = $data['pwd'];

    $sql = "select VERIFY_STATE from MEMBER where MAIL= :mail and PASSWORD= :pwd ";

    $statement = $pdo->prepare($sql);
    $statement -> bindParam(":mail",$mail);
    $statement -> bindParam(":pwd",$pwd);
    $statement -> execute();

    $affectedRow = $statement->fetchAll();

    if(count($affectedRow)>0){
        include './saveMemberIdSession.php';
        if($data[0][0]==1){
            $_SESSION['frontIsLogIn'] = true;
            echo 'true';
        }else{
            $_SESSION['frontIsLogIn'] = false;
            echo 'VERIFY_STATE_0';
        }
    }else{
        $_SESSION['frontIsLogIn'] = false;
        echo 'false';
    }
?>