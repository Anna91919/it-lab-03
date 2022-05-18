<?php
    session_start();

    $comment = $_GET['comment'];

    $file = file('comments.csv');

    $file = fopen('comments.csv', 'a');
    fputcsv($file, array($_SESSION['article_id'], $_SESSION['user']['full_name'], $comment), ';');
    fclose($file);
    
    header('Location: full-article.php');
?>