<?php

include "../connect/conn.php";

//將資料格式轉換
$msgData = file_get_contents('php://input');
$msgItemData = json_decode($msgData, true);


$MsgDate = $msgItemData["MsgDate"];
$MsgText = $msgItemData["MsgText"];
$memberId = $msgItemData["MemberId"];

$sqlinsert = "INSERT INTO ARTICLE_COMMENT(ARTICLE_COMMENT, ARTICLE_COMMENT_DATE, MEMBER_ID) VALUES ('$MsgText', '$MsgDate', '$memberId')";

$Msg = $pdo->exec($sqlinsert);
$json_data = json_encode($Msg);
echo $json_data;
?>