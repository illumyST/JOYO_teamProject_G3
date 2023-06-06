<?php
include '../connect/conn.php';
$data = json_decode(file_get_contents("php://input"),true);
$text = htmlspecialchars($data["text"]);
$ser = "%$text%";
$value = $data["value"];
if($value == 1){
    $sql= "SELECT ar.ARTICLE_ID , ar.TITLE , ar.ARTICLE_DATE , mb.MAIL
    from  ARTICLE ar
    join MEMBER mb
    on ar.MEMBER_ID = mb.MEMBER_ID
    WHERE ar.ARTICLE_ID like  :tex ";
}
else if($value == 2){
    $sql= "SELECT ar.ARTICLE_ID , ar.TITLE  , ar.ARTICLE_DATE , mb.MAIL
    from  ARTICLE ar
    join MEMBER mb
    on ar.MEMBER_ID = mb.MEMBER_ID
    WHERE mb.MAIL like  :tex ";
}
else if($value == 3){
    $sql= "SELECT ar.ARTICLE_ID , ar.TITLE , ar.ARTICLE_DATE , mb.MAIL
    from  ARTICLE ar
    join MEMBER mb
    on ar.MEMBER_ID = mb.MEMBER_ID
    WHERE ar.ARTICLE_DATE like  :tex ";
}
else if($value == 4){
    $sql= "SELECT ar.ARTICLE_ID , ar.TITLE , ar.ARTICLE_DATE , mb.MAIL
    from  ARTICLE ar
    join MEMBER mb
    on ar.MEMBER_ID = mb.MEMBER_ID
    WHERE ar.TITLE  like  :tex ";
}
$stm = $pdo -> prepare($sql);
$stm -> bindvalue(":tex",$ser);
$stm -> execute();
$data = $stm -> fetchAll();

$jsondata = json_encode($data);
header('Content-Type: application/json');
echo $jsondata;
?>