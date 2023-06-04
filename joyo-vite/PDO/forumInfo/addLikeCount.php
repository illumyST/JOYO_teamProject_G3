<?php

include '../connect/conn.php';

$artId = $_POST['artId'];
$likeCount = intval($_POST['likeCount']);


$sql = "UPDATE ARTICLE SET LIKEARTICLE = COALESCE(LIKEARTICLE, 0) + :likeCount WHERE ARTICLE_ID = :artId";

$statement = $pdo->prepare($sql);
$statement->bindValue(':artId', $artId);
$statement->bindValue(':likeCount', $likeCount);
$statement->execute();

$newLikeCount = $likeCount + ($statement->rowCount() > 0 ? $likeCount : 0);


// echo "點讚更新成功";
echo $likeCount;

?>