<?php
    session_start();
    if(!$_SESSION||$_SESSION['isLogIn']!= true){
        echo 0;      
    }else{
        echo 1;
    };
?>

