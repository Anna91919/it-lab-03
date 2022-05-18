<?php
    session_start();

    $all_comments=file('comments.csv');

    $article_comments = array();
    $k = 0;
    $i = 1;
    while($i < count($all_comments))
    {
        $comment = explode(';', $all_comments[$i]);
        if ($comment[0] === $_SESSION['article_id'])
        {
            $article_comments[$k] = $comment;
            $k++;
        }
        $i++;
    }

    if (empty($article_comments))
    {
        echo "<p style='margin-left:41%'>Под данной статьей нет комментариев</p>";
    }
    else
    {
        $k = 0;
        while ($k < count($article_comments))
        {   
            echo "<div class='comment'>";
                echo "<div class='comment-name'>"; 
                    echo trim($article_comments[$k][1], '"');  
                echo "</div>"; 
                echo "<div class='comment-text'>";
                    echo  $article_comments[$k][2]; 
                echo "</div>"; 
            echo "</div>";
            $k++;
        }
    }
?>