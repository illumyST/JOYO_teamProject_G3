<?php
    include "../conn.php";


    $form_category = $_POST["category"];
    $form_title_text = $_POST["title"];
    $form_score = $_POST["score"];
    $form_area = $_POST["area"];
    $form_middle_title = $_POST["postTitle"];
    $form_middle_textarea = $_POST["postContent"];
    $form_label = $_POST["postTags"];
    //建立SQL

    $sql = "INSERT INTO ARTICLE(TITLE, ARTICLE_CATEGORY, GAME_NAME, RATE, LOCATION, ARTICLE_CONTENT, DATE, TAG, MEMBER_ID) VALUES ('$form_middle_title', '$form_category', '$form_title_text', '$form_score', '$form_area', '$form_middle_textarea', NOW(), '$form_label')";
    // $sql = "INSERT INTO ARTICLE(TITLE, ARTICLE_CATEGORY, GAME_NAME, RATE, LOCATION, ARTICLE_CONTENT, DATE, TAG, MEMBER_ID) VALUES ('妙語偵探社', '心得分享', '分享妙語偵探社 Detective Club', '9', '', '在妙語偵探社中，每個玩家都會拿到一張卡牌，上面寫有一個詞語或者短語，玩家們需要在自己的回合輪流發言，並且盡量讓其他玩家相信自己拿到的卡牌是真正的。在遊戲的某個時刻，一位玩家會成為叛徒，他或她知道其他玩家拿到的卡牌，並且要盡力讓其他人猜錯。', NOW(), '健康不賭博,輕度策略團')";
    $forumPost = $pdo->exec($sql);


//     if($forumPost > 0){
//           echo "新增成功!";
//         // 轉址到原本PDO範例中的Select.php
//         // header("Location: Select.php");
//    }else{
//           echo "新增失敗!";
//    }

    
?>