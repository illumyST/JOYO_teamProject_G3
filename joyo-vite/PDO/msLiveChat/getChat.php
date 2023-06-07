<?php
include('../../PDO/connect/conn.php');

$sql = 'SELECT m1.MEMBER_ID, m1.MEMBER_NAME, m2.MSG_ID, m2.OUTGOING_MSG_ID, m2.INCOMING_MSG_ID, m2.MSG_CONTENT
FROM MEMBER m1
LEFT JOIN MESSAGE m2 ON m1.MEMBER_ID = m2.INCOMING_MSG_ID OR m1.MEMBER_ID = m2.OUTGOING_MSG_ID
WHERE m2.MSG_CONTENT IS NOT NULL
AND m2.MSG_ID = (
  SELECT MAX(MSG_ID)
  FROM MESSAGE
  WHERE (INCOMING_MSG_ID = m1.MEMBER_ID OR OUTGOING_MSG_ID = m1.MEMBER_ID)
)
ORDER BY m2.MSG_ID DESC';





$statement = $pdo->prepare($sql);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC); // Use PDO::FETCH_ASSOC to fetch associative array

if (count($data) > 0) {
    echo json_encode($data);
}
?>