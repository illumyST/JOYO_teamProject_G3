<?php
    include "../connect/conn.php";

    //將資料格式轉換
    $postData = file_get_contents('php://input');
    $postItemData = json_decode($postData, true);
    // print_r($postData);


    $category = $postItemData['category'];
    $title = $postItemData['title'];
    $score = intval( $postItemData['score']);
    $postTitle = $postItemData['postTitle'];
    $postContent = $postItemData['postContent'];
    $postTags = $postItemData['postTags'];
    $memberId = $postItemData['memberId'];
    $area = $postItemData['area'];
    
    if($title == null){
        $sqlinsert = "INSERT INTO ARTICLE(TITLE, ARTICLE_CATEGORY, GAME_NAME, RATE, LOCATION, ARTICLE_CONTENT, ARTICLE_DATE, TAG, MEMBER_ID) VALUES ('$postTitle', '$category', '七大奇蹟', '$score', '$area', '$postContent', NOW(), '$postTags', '$memberId')";
    }else{
        //建立SQL
        $sqlinsert = "INSERT INTO ARTICLE(TITLE, ARTICLE_CATEGORY, GAME_NAME, RATE, LOCATION, ARTICLE_CONTENT, ARTICLE_DATE, TAG, MEMBER_ID) VALUES ('$postTitle', '$category', '$title', '$score', '$area', '$postContent', NOW(), '$postTags', '$memberId')";
    }
    // 測試用的資料    
    // $test="INSERT INTO `JOYO`.`ARTICLE` (`TITLE`, `ARTICLE_CATEGORY`, `ARTICLE_CONTENT`, `ARTICLE_DATE`, `MEMBER_ID`) VALUES ('捉迷藏心得分享', '心得分享', '好雷', NOW(), '1');";
    $forumPost = $pdo->exec($sqlinsert);
    $json_data = json_encode($forumPost);
    echo $json_data;
?>