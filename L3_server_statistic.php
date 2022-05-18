<?php
    $statistics=array();
    $f=fopen('statistics.csv','r');
    $p = fgetcsv($f,10000,';');
    while (!feof($f))
    {	$p = fgetcsv($f,10000,';');
        $statistics[]=$p;
    }
    fclose($f);

    $article_data=array();
    $f=fopen('articles.csv','r');
    $p = fgetcsv($f,10000,';');
    while (!feof($f))
    {	$p = fgetcsv($f,10000,';');
        $article_data[]=$p;
    }
    fclose($f);    

    echo "<table id='data-table'> ";
        echo "<tr>";
            echo "<td>ID</td>";
            echo "<td>Название</td>";
            echo "<td>Просмотры</td>";
        echo "</tr>";

        $i = 0;
        while($i < count($statistics))
        { 
            echo "<tr>";
                echo "<td>"; 
                echo $statistics[$i][0];
                echo "</td>";
                echo "<td>"; 
                echo $article_data[$i][3];
                echo "</td>"; 
                echo "<td>"; 
                echo $statistics[$i][1];
                echo "</td>";  
            echo "</tr>"; 
            
            $i++;
        }
    echo "</table> ";
?>