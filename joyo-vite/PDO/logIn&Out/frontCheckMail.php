<?php
include('../connect/conn.php');

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$verify_code = $data['verifyCode'];


?>