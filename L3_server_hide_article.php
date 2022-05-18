<?php

    session_start();

    $id = $_POST['id'];

    $file = file('show_articles.csv');

    $f = explode(';', $file[$id-1]);

    $f[1] = 0;
    $str = implode(';', $f) . "\n";

    array_splice($file, $id - 1, 1, $str);

    file_put_contents("show_articles.csv", $file);

?>