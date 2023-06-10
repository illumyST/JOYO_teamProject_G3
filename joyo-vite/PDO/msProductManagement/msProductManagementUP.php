<?php
// echo "1243" ;
include '../connect/conn.php';
$data = json_decode(file_get_contents('php://input'),true);
// print_r($_POST);
// echo "123" ;
$opid = $_POST["opid"] ;
$pid = htmlspecialchars($_POST['pid']);
$ppr = htmlspecialchars($_POST['ppr']);
$pstock = htmlspecialchars($_POST['pstock']);
$ptype = htmlspecialchars($_POST['ptype']);
$pplayersMIN = htmlspecialchars($_POST['pplayersMIN']);
$pplayersMAX = htmlspecialchars($_POST['pplayersMAX']);
$page = htmlspecialchars($_POST['page']);
$ptimeMIN = htmlspecialchars($_POST['ptimeMIN']);
$ptimeMAX = htmlspecialchars($_POST['ptimeMAX']);
$ptarea = htmlspecialchars($_POST['ptarea']);
$image_tmp1  =  $_FILES["pimg1"]["tmp_name"]; 
$image_tmp2  =  $_FILES["pimg2"]["tmp_name"]; 
$image_tmp3  =  $_FILES["pimg3"]["tmp_name"]; 
$image_tmp4  =  $_FILES["pimg4"]["tmp_name"];
$imgArr = [
    0=>["name"=>$_FILES["pimg1"]["name"],"tmpname"=>$image_tmp1],
    1=>["name"=>$_FILES["pimg2"]["name"],"tmpname"=>$image_tmp2],
    2=>["name"=>$_FILES["pimg3"]["name"],"tmpname"=>$image_tmp3],
    3=>["name"=>$_FILES["pimg4"]["name"],"tmpname"=>$image_tmp4],
];
$imgurl=[];

// -------------------------------------------------------------------------------------------

$IMGUR_CLIENT_ID  = "1d5b8193eea838b" ;

for($a = 0 ; $a<COUNT($imgArr) ; $a++){
    if($imgArr[$a]['name'] != ""){
        // echo $imgArr[$a]['name'] ;
    $UID = $imgArr[$a]['name'];
    $image_tmp  =  file_get_contents($imgArr[$a]['tmpname']); 

// echo $image_tmp;

$ch  =  curl_init (); 
curl_setopt ( $ch ,  CURLOPT_URL ,  'https://api.imgur.com/3/image' ); 
curl_setopt ( $ch ,  CURLOPT_POST ,  TRUE ); 
curl_setopt ( $ch ,  CURLOPT_RETURNTRANSFER ,  TRUE); 
curl_setopt ( $ch ,  CURLOPT_HTTPHEADER , array( 'Authorization: Client-ID '  .  $IMGUR_CLIENT_ID )); 
curl_setopt ( $ch ,  CURLOPT_POSTFIELDS , array( 'image'  =>  base64_encode ( $image_tmp ))); 
$response  =  curl_exec ( $ch ); 
curl_close ( $ch );
$responseArr  =  json_decode ( $response ); 

// 取得物件 的內容寫法
$ll =  $responseArr -> data -> link  ;

$imgurl[$a] = $ll ;
}else{
    $imgurl[$a] = null ;
}}
// print_r($imgurl);
// -------------------------------------------------------------------------------------------

$sql = "UPDATE PRODUCT SET NAME = ?,CATEGORY= ?,PRICE= ?,CURRENT_PRICE = ?,IMG_URL_ONE= ?,IMG_URL_TWO= ?,IMG_URL_THREE= ?,IMG_URL_FOUR= ?
,DESCRIPTION= ?,MIN_TIME= ?,MAX_TIME= ?,MIN_PLAYER= ?,MAX_PLAYER= ?,MIN_AGE= ?,STOCK= ? WHERE PRODUCT_ID = ? " ;
$stm = $pdo -> prepare($sql);
$data =$stm -> execute(array($pid,$ptype,$ppr,$ppr,$imgurl[0],$imgurl[1],$imgurl[2],$imgurl[3],$ptarea,$ptimeMIN,$ptimeMAX,$pplayersMIN,$pplayersMAX,$page,$pstock,$opid));

if(isset($stm)){
// header("location:http://localhost:5174/#/ms/msProductManagement");
    echo true ;
}else{
    echo false ;
}






?>