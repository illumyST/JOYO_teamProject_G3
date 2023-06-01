<?php
// 抓取指定路徑中的outpu.csv 並寄送
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'joyogamethd101@gmail.com';
$mail->Password = 'catobidshquojtxy';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('joyogamethd101@gmail.com');
$mail->isHTML(true);
$mail->Subject = $_POST["subject"];
$mail->Body = $_POST["message"];
$mail->addAddress($_POST["email"]);
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$mail->addAttachment('../../public/csvs/'.$startDate.'_'.$endDate.'.csv');
$mail->CharSet = 'UTF-8';
if ($mail->send()) {
    echo "Success"; // 在成功发送邮件后返回成功字符串给前端
} else {
    echo "Error sending email. Please try again."; // 在发送邮件时出错时返回错误字符串给前端
}

?>