<?php

include "../connect/conn.php";

//將資料格式轉換
$msgData = file_get_contents('php://input');
$msgItemData = json_decode($msgData, true);


$MsgText = $msgItemData["MsgText"];
$memberId = $msgItemData["MemberId"];
$articleID = $msgItemData["articleID"];

$sqlinsert = "INSERT INTO ARTICLE_COMMENT(ARTICLE_COMMENT, ARTICLE_COMMENT_DATE, MEMBER_ID, ARTICLE_ID) VALUES ('$MsgText', NOW(), '$memberId', '$articleID')";

$Msg = $pdo->exec($sqlinsert);
$json_data = json_encode($Msg);
echo $json_data;
?>