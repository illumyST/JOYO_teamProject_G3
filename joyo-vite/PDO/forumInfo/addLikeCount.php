<?php

include '../connect/conn.php';

$artId = $_POST['artId'];
$likeCount = intval($_POST['likeCount']);
$memberId = $_POST['memberId'];

$sqlCheck = "SELECT COUNT(*) FROM ARTICLE_LIKE WHERE ARTICLE_ID = :artId AND MEMBER_ID = :memberId";
$statementCheck = $pdo->prepare($sqlCheck);
$statementCheck->bindValue(':artId', $artId);
$statementCheck->bindValue(':memberId', $memberId);
$statementCheck->execute();
$hasLiked = $statementCheck->fetchColumn() > 0;


if ($hasLiked) {
    // 如果已按過讚，則從ARTICLE_LIKE表中移除該紀錄並減少LIKEARTICLE數量
    $sqlUnlike = "DELETE FROM ARTICLE_LIKE WHERE ARTICLE_ID = :artId AND MEMBER_ID = :memberId";
    $statementUnlike = $pdo->prepare($sqlUnlike);
    $statementUnlike->bindValue(':artId', $artId);
    $statementUnlike->bindValue(':memberId', $memberId);
    $statementUnlike->execute();

    $sqlUpdateCount = "UPDATE ARTICLE SET LIKEARTICLE = LIKEARTICLE - :likeCount WHERE ARTICLE_ID = :artId";
    $statementUpdateCount = $pdo->prepare($sqlUpdateCount);
    $statementUpdateCount->bindValue(':artId', $artId);
    $statementUpdateCount->bindValue(':likeCount', $likeCount);
    $statementUpdateCount->execute();
} else {
    // 如果未按過讚，則在ARTICLE_LIKE表中插入該紀錄並增加LIKEARTICLE數量
    $sqlLike = "INSERT INTO ARTICLE_LIKE (ARTICLE_ID, MEMBER_ID) VALUES (:artId, :memberId)";
    $statementLike = $pdo->prepare($sqlLike);
    $statementLike->bindValue(':artId', $artId);
    $statementLike->bindValue(':memberId', $memberId);
    $statementLike->execute();

    $sqlUpdateCount = "UPDATE ARTICLE SET LIKEARTICLE = LIKEARTICLE + :likeCount WHERE ARTICLE_ID = :artId";
    $statementUpdateCount = $pdo->prepare($sqlUpdateCount);
    $statementUpdateCount->bindValue(':artId', $artId);
    $statementUpdateCount->bindValue(':likeCount', $likeCount);
    $statementUpdateCount->execute();
}

// $newLikeCount = $likeCount + ($hasLiked ? -$likeCount : $likeCount);

$newLikeCount = $likeCount + ($statementUpdateCount->rowCount() > 0 ? $likeCount : 0);
echo json_encode(['liked' => $hasLiked, 'likeCount' => $newLikeCount]);

// echo json_encode(['liked' => $hasLiked]);



// $sql = "UPDATE ARTICLE SET LIKEARTICLE = COALESCE(LIKEARTICLE, 0) + :likeCount WHERE ARTICLE_ID = :artId";

// $statement = $pdo->prepare($sql);
// $statement->bindValue(':artId', $artId);
// $statement->bindValue(':likeCount', $likeCount);
// $statement->execute();

// $newLikeCount = $likeCount + ($statement->rowCount() > 0 ? $likeCount : 0);


// echo "點讚更新成功";
// echo $likeCount;

?>