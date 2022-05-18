<?php
    $file_out = file("users.csv"); //читаем нужный файл
    // $file = array_splice($file, 3); //удаляем 3 строки
    // file_put_contents("file.csv", implode("", $file)); //сохраняем в этот же файл
    echo '<pre>';
    print_r($file_out);
    echo '</pre>';

    $f = explode(';', $file_out[2]);

    echo '<pre>';
    print_r($f);
    echo '</pre>';

    $str = trim($f[1], '"');
    echo $str;

    // echo count($file_out);

?>
