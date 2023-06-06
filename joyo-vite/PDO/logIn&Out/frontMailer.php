<?php
    // 引入必要的PHPMailer類別
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // ----------------- 寄驗證信 -----------------------//

    require '../msSendReport/PHPMailer/src/Exception.php';
    require '../msSendReport/PHPMailer/src/PHPMailer.php';
    require '../msSendReport/PHPMailer/src/SMTP.php';

    // 建立PHPMailer物件
    $mailer = new PHPMailer(true);

    // 設定SMTP
    $mailer->isSMTP(); // 使用SMTP協定寄送郵件
    $mailer->Host = 'smtp.gmail.com'; // 設定SMTP伺服器
    $mailer->SMTPAuth = true; // 啟用SMTP驗證
    $mailer->Username = 'joyogamethd101@gmail.com'; // Gmail帳號
    $mailer->Password = 'catobidshquojtxy'; // Gmail密碼
    $mailer->SMTPSecure = 'ssl'; // 使用SSL加密連線
    $mailer->Port = 465; // Gmail SMTP的連接埠

    // 設定寄件者/收件者
    $mailer->setFrom('joyogamethd101@gmail.com');
    $mailer->CharSet = 'UTF-8'; // 設定郵件編碼為UTF-8
    // 設定郵件內容
    $mailer->isHTML(true); // 使用HTML格式的郵件內容
?>