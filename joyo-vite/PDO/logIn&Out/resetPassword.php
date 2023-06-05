<?php

    include('../connect/conn.php');

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    // TODO 先驗證這個郵件是否註冊過
    $mail = $data['mail'];

    // 隨機印出10碼亂數密碼，包含數字和英文（至少一大寫）
    $passwordList=[chr(random_int(65,90)),chr(random_int(97,122)),random_int(0,9)];
    for($i=3;$i<10;$i++){
        if(random_int(0,1)){
            if(random_int(0,1)){
                $passwordList[$i] = chr(random_int(97,122));
            }else{
                $passwordList[$i] = chr(random_int(65,90));
            };
        }else{
            $passwordList[$i]=random_int(0,9);
        };
    };
    shuffle($passwordList);
    $password = join('',$passwordList);

    // ----------------- 寄驗證信 -----------------------//
        include './frontMailer.php';
        
        $mailer->Subject = '桌迷藏密碼重置信';
        $mailer->Body = "<h3 style='font-size:24px'>您的新密碼為 <b> $password </b><br>請儘速回桌迷藏官網登入，登入後請至會員中心再次修改密碼！<h3>"; 
        $mailer->addAddress($mail);


    // 寄送郵件並檢查是否成功
    if ($mailer->send()) {
        echo 'true'; // 寄送成功
    } 
?>