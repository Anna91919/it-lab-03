<?php
    session_start();

    $new_categoty = $_GET['new_category'];

    $file = file('categories.csv');

    $file = fopen('categories.csv', 'a');
    fputcsv($file, array($new_categoty), ';');
    fclose($file);
    
    header('Location: main_admin.php');
?>