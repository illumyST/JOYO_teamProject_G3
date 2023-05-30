<?php
    include "../connect/conn.php";

    //將資料格式轉換
    $postData = file_get_contents('php://input');

    $postItemData = json_decode($postData, true);
    print_r($postItemData);
    

    $category = $postItemData['category'];
    $title = $postItemData['title'];
    $score = intval($postItemData['score']);
    $area = $postItemData['area'];
    $postTitle = $postItemData['postTitle'];
    $postContent = $postItemData['postContent'];
    $postTags = $postItemData['postTags'];
    $memberId = $postItemData['memberId'];


    // 建立一個新的變數存放資料庫數據
    // $Post = new PDO($dsn, $db_user, $db_pass);

    //建立SQL
//     if (empty($category) || empty($title) || empty($postTitle) || empty($postContent)) {
//        // 处理空值情况
//        echo "字段不能为空";
//      } else {
       //建立SQL
       // $sqlinsert = "INSERT INTO ARTICLE(TITLE, ARTICLE_CATEGORY, GAME_NAME, RATE, LOCATION, ARTICLE_CONTENT, ARTICLE_DATE, TAG, MEMBER_ID) VALUES ('$postTitle', '$category', '$title', '$score', '$area', '$postContent', NOW(), '$postTags', '$memberId')";
       $sql = "INSERT INTO ARTICLE(TITLE, ARTICLE_CATEGORY, GAME_NAME, RATE, LOCATION, ARTICLE_CONTENT, DATE, TAG, MEMBER_ID) VALUES ('妙語偵探社', '心得分享', '分享妙語偵探社 Detective Club', '9', '', '在妙語偵探社中，每個玩家都會拿到一張卡牌，上面寫有一個詞語或者短語，玩家們需要在自己的回合輪流發言，並且盡量讓其他玩家相信自己拿到的卡牌是真正的。在遊戲的某個時刻，一位玩家會成為叛徒，他或她知道其他玩家拿到的卡牌，並且要盡力讓其他人猜錯。', NOW(), '健康不賭博,輕度策略團', '1')";
       $forumPost = $pdo->query($sql);

       if($forumPost > 0){
              echo "新增成功!";
              // 轉址到原本PDO範例中的Select.php
              // header("Location: Select.php");
       }else{
              echo "新增失敗!";
       }
//      }
?>