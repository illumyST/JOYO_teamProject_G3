<?php
include '../connect/conn.php';

$sql = "SELECT * FROM BANNER";
$statement = $pdo->prepare($sql);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

if (count($data) > 0) {
    echo json_encode($data);
} else {
    echo "fail";
}
?>