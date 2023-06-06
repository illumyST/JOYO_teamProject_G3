<?php
    session_start();

    if (!isset($_SESSION['isLogIn'])) {
        $_SESSION['isLogIn'] = false;
    };    
    if($_SESSION['isLogIn']!= true){
        echo 'false'; 
        // indexMs.vue 會 console 布林值
        // 如果寫 false 會 console.log(isLogIn.value) 空值
        
    }else{
        echo 'true';
    };

?>

