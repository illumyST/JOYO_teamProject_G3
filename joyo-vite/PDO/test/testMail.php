<?php

// // 引入必要的PHPMailer類別
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../msSendReport/PHPMailer/src/Exception.php';
require '../msSendReport/PHPMailer/src/PHPMailer.php';
require '../msSendReport/PHPMailer/src/SMTP.php';

// 建立PHPMailer物件
$mail = new PHPMailer(true);

// 設定SMTP
$mail->isSMTP(); // 使用SMTP協定寄送郵件
$mail->Host = 'smtp.gmail.com'; // 設定SMTP伺服器
$mail->SMTPAuth = true; // 啟用SMTP驗證
$mail->Username = 'joyogamethd101@gmail.com'; // Gmail帳號
$mail->Password = 'catobidshquojtxy'; // Gmail密碼
$mail->SMTPSecure = 'tls'; // 使用SSL加密連線
$mail->Port = 587; // Gmail SMTP的連接埠

// 設定寄件者
$mail->setFrom('joyogamethd101@gmail.com');

// 設定郵件內容
$mail->isHTML(true); // 使用HTML格式的郵件內容
$mail->Subject = '桌迷藏測試'; // 郵件主旨
$mail->Body = '桌迷藏測試'; // 郵件內容

// 設定收件者
$mail->addAddress('joyogamethd101@gmail.com'); // 從POST請求中取得收件者信箱

$mail->CharSet = 'UTF-8'; // 設定郵件編碼為UTF-8

// 寄送郵件並檢查是否成功
if ($mail->send()) {
    echo "Success"; // 寄送成功
} else {
    echo "Error sending email. Please try again."; // 寄送失敗
}
?>
