<?php
    include 'test.php';
    session_start();
    $_SESSION['hi']=$hi;
    // $_SESSION['member_id']=25;
    echo $_SESSION['hi'];
?>