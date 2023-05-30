<?php
    session_start();
    if(!$_SESSION||$_SESSION['frontIsLogIn']!= true){
        echo 'false'; 
        // indexMs.vue 會 console 布林值
        // 如果寫 false 會 console.log(isLogIn.value) 空值
        
    }else{
        echo 'true';
    };
?>

