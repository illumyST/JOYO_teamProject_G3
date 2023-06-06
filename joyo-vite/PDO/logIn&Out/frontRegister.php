<?php
    include('../connect/conn.php');

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    // $member_name = $data['member_name'];
    // $mail = $data['mail'];
    // $password = $data['password'];

    // test data
    $member_name = 'mailtest';
    $mail = 'illumy.design@gmail.com';
    $password = 123;

    $random = rand(100000, 999999);
    $sql = "insert into MEMBER(MEMBER_NAME,MAIL,PASSWORD,VERIFY_STATE,VERRIFY_CODE)
            values( ?, ?, ?,0,$random)" ;
    
    $statement = $pdo->prepare($sql);
    $statement -> bindParam(1,$member_name);
    $statement -> bindParam(2,$mail);
    $statement -> bindParam(3,$password);
    $statement -> execute();
    // 是否要 insert verify code / state

    $affectedRow =  $statement -> fetchAll();

    if($affectedRow > 0){

    // ----------------- 寄驗證信 -----------------------//
        include './frontMailer.php';
        
        $mailer->Subject = '桌迷藏會員驗證'; // 郵件主旨
        $mailer->Body = "<h3 style='font-size:24px'>感謝您註冊桌迷藏會員，請回桌迷藏官網輸入以下6位數驗證碼 <br> <b>$random</b> <h3>"; // 郵件內容

        // 設定收件者
        $mailer->addAddress($mail); // 從POST請求中取得收件者信箱


    // 寄送郵件並檢查是否成功
    if ($mailer->send()) {
        include './saveMemberIdSession.php';
        echo 'true'; // 寄送成功
    } 
        // 因為前端已驗證過所以不會寄失敗...?
        // else {
        //     echo "Error sending email. Please try again."; // 寄送失敗
        // };
    
    }else{
        echo 'false';
    };

?>