<?php
    include "../conn.php"; 


    $form_category = $_POST["forumPost_form_category"];
    $form_title_text = $_POST["forumPost_form_title_text"];
    $form_score = $_POST["forumPost_form_score"];
    $form_area = $_POST["forumPost_form_area"];
    $form_middle_title = $_POST["forumPost_form_middle_title"];
    $form_middle_textarea = $_POST["forumPost_form_middle_textarea"];
    $form_label = $_POST["forumPost_form_middle_bottom_text"];
    //建立SQL
    $sql = "INSERT INTO ARTICLE(TITLE, ARTICLE_CATEGORY, GAME_NAME, RATE, LOCATION, CONTENT, DATE, LABEL) VALUES ('$form_middle_title', '$form_category', '$form_title_text', '$form_score', '$form_area', '$form_middle_textarea', NOW(), '$form_label')";

    //執行
    $affectedRow = $pdo->exec($sql);
    if($affectedRow > 0){
        echo "新增成功!";
    }else{
         echo "新增失敗!";
    }
?>