<?php
    session_start();

    $file_out = file("statistics.csv");

    $result = array(['Статья (идентификатор)', 'Количество просмотров']);

    $i = 1;
    while($i < count($file_out)){ 
        $f = explode(';', $file_out[$i]);
        $arr = array($i, $f[1]);
        array_push ($result, $arr);
        $i++;
    }   

    $i = 0;
    while($i < count($file_out)){ 
        $_SESSION["data_graphic"][$i] = implode(",", $result[$i]);
        $i++;
    }
?>
