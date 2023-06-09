<?php
include('../connect/conn.php');
// 取得傳遞的參數
$adminId = $_POST["adminId"];
$msg_content = $_POST["msg_content"];
$senderId = $_POST["senderId"];

// 準備 SQL 語句
$sql = "INSERT INTO MESSAGE (MESSAGE_TIME, OUTGOING_MSG_ID, MSG_CONTENT, INCOMING_MSG_ID)
          VALUES (NOW(), :senderId, :msg_content, :adminId)";

// 建立 prepared statement
$statement = $pdo->prepare($sql);

// 綁定參數值
$statement->bindParam(":adminId", $adminId);
$statement->bindParam(":msg_content", $msg_content);
$statement->bindParam(":senderId", $senderId);

// 執行 SQL 語句
$statement->execute();


?>