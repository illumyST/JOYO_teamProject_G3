<?php

include '../connect/conn.php';

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// 版位、圖片資料
$selectedOptionA = $_POST["selectedOptionA"];
$selectedOptionB = $_POST["selectedOptionB"];
$imageUrl = $_POST["imageUrl"];


// 接收圖片上傳
$fileUpload = $_FILES["fileUpload"];
$fileTempPath = $fileUpload["tmp_name"];
$fileExtension = pathinfo($fileUpload["name"], PATHINFO_EXTENSION);
$fileName = date("YmdHis") . "_" . uniqid() . "." . $fileExtension;
$fileUploadPath = "../../public/IMG/" . $fileName;
move_uploaded_file($fileTempPath, $fileUploadPath);

$sql = "INSERT INTO BANNER (POSITION, PAGE, PIC_URL, DESCRIPTION, BANNER_DATE)
VALUES ('$selectedOptionB', '$selectedOptionA', '$imageUrl','', NOW())";

$statement = $pdo->prepare($sql);
$statement->execute();
$affectedRow = $pdo->exec($sql);

$data = $statement->fetchAll();
if ($affectedRow > 0) {
    echo "success";
    // echo $data;
} else {
    echo "fail";
}
?>