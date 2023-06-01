<?php

$host = '127.0.0.1' ;
$user = 'root' ;
$pas = 'password' ;
$select = 'JOYO';

$dsn = 'mysql:host='.$host.';dbname='.$select.";charset=utf8";
$pdo = new PDO($dsn,$user,$pas) ;

?>