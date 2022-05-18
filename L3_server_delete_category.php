<?php

    session_start();

    $category = $_POST['category'];

    $file = file('categories.csv');

    $i = 0;
    while ($i < count($file))
    {
        if(strpos($file[$i], $category) !== false)
        {
            array_splice($file, $i, 1);
            file_put_contents("categories.csv", $file);
        }
        $i++;
    }

?>