<?php
    session_start(); 
    include('../connect/conn.php');
    $member_id = $_SESSION['member_id'];
    echo $member_id; 
?>
