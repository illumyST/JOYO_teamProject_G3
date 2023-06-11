<?php
    include '../connect/conn.php';
    session_start();
    $member_id = $_SESSION['member_id'];

    //判斷是否上傳成功
    if($_FILES["file"]["error"] > 0){
        echo "上傳失敗: 錯誤代碼".$_FILES["file"]["error"];
    }else{
        //取得上傳的檔案資訊=======================================
        $fileUpload = $_FILES["file"];
        $fileTempPath = $fileUpload["tmp_name"];
        // $fileExtension = pathinfo($fileUpload["name"], PATHINFO_EXTENSION);
        $fileExtension = 'png';
        $fileName = $member_id."_photo.".$fileExtension;
        $fileUploadPath = "../../src/assets/img/member_photo/".$fileName;
        move_uploaded_file($fileTempPath, $fileUploadPath );
        $sql = "update MEMBER
                set IMG_URL = '$fileUploadPath'
                where MEMBER_ID = '$member_id'";
        
        $statement = $pdo->prepare($sql);
        $statement->execute();

        echo $fileUploadPath;
    }
?>
