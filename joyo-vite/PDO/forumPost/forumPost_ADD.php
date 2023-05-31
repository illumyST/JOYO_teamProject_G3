<?php
    include "../connect/conn.php";

    //將資料格式轉換
    $postData = file_get_contents('php://input');

    $postItemData = json_decode($postData, true);
    print_r($postData);
    $category = $postItemData['category'];
    $title = $postItemData['title'];
    $score = intval( $postItemData['score']);
    $postTitle = $postItemData['postTitle'];
    $postContent = $postItemData['postContent'];
    $postTags = $postItemData['postTags'];
    $memberId = $postItemData['memberId'];
    $area = $postItemData['area'];


    //建立一個新的變數存放資料庫數據
       // $Post = new PDO($dsn,$user,$pas);
       //建立SQL
       $sqlinsert = "INSERT INTO ARTICLE(TITLE, ARTICLE_CATEGORY, GAME_NAME, RATE, `LOCATION`, ARTICLE_CONTENT, ARTICLE_DATE, TAG, MEMBER_ID) VALUES ('$postTitle', '$category', '$title', '$score', $area, '$postContent', NOW(), '$postTags', '$memberId')";
       // $sql = "INSERT INTO `ARTICLE`(`TITLE`, `ARTICLE_CATEGORY`, `GAME_NAME`, `RATE`, `LOCATION`, `ARTICLE_CONTENT`, `ARTICLE_DATE`, `TAG`, `MEMBER_ID`) VALUES ('大鎌戦役', '心得分享', '分享妙語偵探社 Detective Club', '9', '', '在妙語偵探社中，每個玩家都會拿到一張卡牌，上面寫有一個詞語或者短語，玩家們需要在自己的回合輪流發言，並且盡量讓其他玩家相信自己拿到的卡牌是真正的。在遊戲的某個時刻，一位玩家會成為叛徒，他或她知道其他玩家拿到的卡牌，並且要盡力讓其他人猜錯。', NOW(), '健康不賭博,輕度策略團', '1')";
       
       // $test="INSERT INTO `JOYO`.`ARTICLE` (`TITLE`, `ARTICLE_CATEGORY`, `ARTICLE_CONTENT`, `ARTICLE_DATE`, `MEMBER_ID`) VALUES ('捉迷藏心得分享', '心得分享', '好雷', NOW(), '1');";
       $forumPost = $pdo->exec($sqlinsert);
       $json_data = json_encode($forumPost);
       echo $json_data;
       // if($json_data > 0){
       //        echo $json_data;
       //        // 轉址到原本PDO範例中的Select.php
       //        // header("Location: Select.php");
       // }else{
       //        echo "新增失敗!";
       // }
?>