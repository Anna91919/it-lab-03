<?php
    $article_data=array();
    $f=fopen('articles.csv','r');
    $p = fgetcsv($f,10000,';');
    while (!feof($f))
    {	$p = fgetcsv($f,10000,';');
        $article_data[]=$p;
    }
    fclose($f);

    $f=fopen('show_articles.csv','r');
    while (!feof($f))
    {	$p = fgetcsv($f,10000,';');
        $show_articles[]=$p;
    }
    fclose($f);

    $i = 0;
    echo "<ul class = 'articles' id='holder'>";
    foreach($article_data as $a_data)
    {
        if ($show_articles[$i][1] === "1")
        {

            echo "<li class='article-wrapper'> "; 
            $data_date = $a_data[2];
            $data_title= $a_data[3];
            $data_src= $a_data[4]; 
            $data_id = $a_data[0];
            $data_short_description=$a_data[6];
            include "template_user.html";
            echo "</div>";

            echo "</li>";
        }

        $i++;
    }
    echo "</ul>";

?>