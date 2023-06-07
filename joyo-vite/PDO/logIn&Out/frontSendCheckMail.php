<?php
    session_start();
    include('../connect/conn.php');

    // 取得信箱
    $member_id = $_SESSION['member_id'];
    $sql = "select MAIL from MEMBER where MEMBER_ID = $member_id";
    $statement = $pdo -> prepare($sql);
    $statement -> execute();
    $affectedRow =  $statement -> fetchAll();
    $mail = $affectedRow[0][0];

    // 更改資料庫的 VERRIFY_CODE
    $random = rand(100000, 999999);
    $sql = "update MEMBER
	        set VERRIFY_CODE = $random
            where MEMBER_ID = $member_id;";
    $statement = $pdo->prepare($sql);
    $statement -> execute();


    // ----------------- 寄驗證信 -----------------------//
    include './frontMailer.php';
            
    $mailer->Subject = '桌迷藏會員驗證'; // 郵件主旨
    $mailer->Body = "<h3 style='font-size:24px'>感謝您註冊桌迷藏會員，請回桌迷藏官網輸入以下6位數驗證碼 <br> <b>$random</b> <h3>"; // 郵件內容

    // 設定收件者
    $mailer->addAddress($mail); // 從POST請求中取得收件者信箱
    if ($mailer->send()) {
        echo 'true'; // 寄送成功
    }else{
        echo 'false';
    };

?>