<?php
$data = json_decode(file_get_contents('php://input'), true);
include '../connect/conn.php';

$sear = $data['_rawValue'] ['select'];
// echo $sear ;

if($sear != ""){

  $see = htmlspecialchars($sear);
  $saa = "%$see%";
  
    $sql = "SELECT * FROM PRODUCT WHERE NAME like :ids " ;
    $stm = $pdo -> prepare($sql);
    $stm -> bindvalue(":ids",$saa);
    $stm -> execute();
    $data = $stm ->fetchAll();

    $jsonData = json_encode($data);

    header('Content-Type: application/json');
    echo $jsonData;
        
    
    }



?>

