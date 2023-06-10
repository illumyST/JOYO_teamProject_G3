<?php
    include('../connect/conn.php');

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    $member_name = $data['member_name'];
    $mail = $data['mail'];
    $password = $data['password'];

    // test data
    // $member_name = 'mailtest';
    // $mail = 'illumy.design@gmail.com';
    // $password = 123;

    // 確認此信箱是否註冊過
    $sql = "select * from MEMBER where MAIL = ? ";
    $statement = $pdo -> prepare($sql);
    $statement -> bindValue(1, $mail);
    $statement -> execute();
    $affectedRow =  $statement -> fetchAll();

    if(count($affectedRow)>0){
        
        // 註冊過
        echo 'false';

    }else{
        
        // 沒註冊過
        $random = rand(100000, 999999);
        $sql = "insert into MEMBER(MEMBER_NAME,MAIL,PASSWORD,VERIFY_STATE,IMG_URL,VERRIFY_CODE)
                values( ?, ?, ?,0,'../../src/assets/img/member_photo/cat.png',$random)" ;
        
        $statement2 = $pdo->prepare($sql);
        $statement2 -> bindParam(1,$member_name);
        $statement2 -> bindParam(2,$mail);
        $statement2 -> bindParam(3,$password);
        $statement2 -> execute();

        // insert 的 $affectedRow 會是空的！！！


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
                else {
                    echo 'false'; // 寄送失敗
            };
    };

?>