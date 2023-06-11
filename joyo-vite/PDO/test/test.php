<?php
    echo 2;
    // $command = 'cd ../../new-workspace; vmail send';
    $command = '';
    // 執行終端機指令
    $output = shell_exec($command);

    // 輸出結果
    if($output === null){
        echo '$output is null';
    }else{
        echo $output;
    };

?>
