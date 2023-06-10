<?php
    session_start();
    include '../connect/conn.php';
    $member_id = $_SESSION['member_id'];

    $sql = "select * from MEMBER where MEMBER_ID = '$member_id'";

    $statement = $pdo->prepare($sql);
    $statement -> execute();
    $datas = $statement->fetchall();

    echo json_encode($datas);
?>