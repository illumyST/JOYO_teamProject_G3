<?php

include '../connect/conn.php';

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// 版位、圖片資料
$selectedOptionA = $_POST["selectedOptionA"];
$selectedOptionB = $_POST["selectedOptionB"];
$imageUrl = $_POST["imageUrl"];
$imgAlt = $_POST["imgAlt"];

// 接收圖片上傳
$fileUpload = $_FILES["fileUpload"];
$fileTempPath = $fileUpload["tmp_name"];
$fileExtension = pathinfo($fileUpload["name"], PATHINFO_EXTENSION);

// 判斷版位，給對應版位檔名
if ($selectedOptionA == "index" && $selectedOptionB == "A") {
    $fileName = "index_banner_a";
} else if ($selectedOptionA == "index" && $selectedOptionB == "B") {
    $fileName = "index_banner_b";
} else if ($selectedOptionA == "index" && $selectedOptionB == 'C') {
    $fileName = "index_banner_c";
} else if ($selectedOptionA == "index" && $selectedOptionB == 'D') {
    $fileName = "index_banner_d";
} else if ($selectedOptionA == "index" && $selectedOptionB == 'E') {
    $fileName = "index_banner_e";
} else if ($selectedOptionA == "forum" && $selectedOptionB == "A") {
    $fileName = "forum_banner_a";
} else {
    $fileName = "product.banner_a"; 
};
$fileName .= "." . $fileExtension;
$fileUploadPath = "../../src/assets/img/" . $fileName;

// Check if the file already exists, delete it if it does
if (file_exists($fileUploadPath)) {
    unlink($fileUploadPath);
}

move_uploaded_file($fileTempPath, $fileUploadPath);

$sql = "UPDATE BANNER
        SET PIC_URL = '$imageUrl', BANNER_DATE = NOW(), DESCRIPTION = '$imgAlt'
        WHERE POSITION = '$selectedOptionB' AND PAGE = '$selectedOptionA'";

// $sql = "INSERT INTO BANNER (POSITION, PAGE, PIC_URL, DESCRIPTION, BANNER_DATE)
// VALUES ('$selectedOptionB', '$selectedOptionA', '$imageUrl','', NOW())";

$statement = $pdo->prepare($sql);
$statement->execute();
$affectedRows = $statement->rowCount();

if ($affectedRows !== false && $affectedRows > 0) {
    echo "success";
} else {
    echo "fail";
}
?>
