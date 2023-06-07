<?php
include('../connect/conn.php');
$userId = $_GET["userId"];
$sql = "SELECT m1.MEMBER_ID, m1.MEMBER_NAME, m2.MSG_ID, m2.OUTGOING_MSG_ID, m2.INCOMING_MSG_ID, m2.MSG_CONTENT
FROM MEMBER m1
LEFT JOIN MESSAGE m2 ON m1.MEMBER_ID = m2.INCOMING_MSG_ID OR m1.MEMBER_ID = m2.OUTGOING_MSG_ID
WHERE (m2.INCOMING_MSG_ID = '$userId' OR m2.OUTGOING_MSG_ID = '$userId')
  AND m2.MSG_CONTENT IS NOT NULL
ORDER BY m2.MSG_ID ASC";

$statement = $pdo->prepare($sql);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC); // Use PDO::FETCH_ASSOC to fetch associative array

if (count($data) > 0) {
    echo json_encode($data);
}
?>