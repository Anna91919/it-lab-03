<?php

session_start();

$id = $_GET['id'];

$file = file('statistics.csv');

$f = explode(';', $file[$id]);

$f[1] ++;
$str = implode(';', $f) . "\n";

array_splice($file, $id, 1, $str);

file_put_contents("statistics.csv", $file);

$_SESSION['article_id'] = $id;

$f=fopen('articles.csv','r');
$p = fgetcsv($f,10000,';');
while (!feof($f))
{	$p = fgetcsv($f,10000,';');
	$article_data[]=$p;
}
fclose($f);

$_SESSION['data_date'] = $article_data[$id - 1][2];
$_SESSION['data_title'] = $article_data[$id - 1][3];
$_SESSION['data_src1'] = $article_data[$id - 1][4];
$_SESSION['data_short_description'] = $article_data[$id - 1][6];
$_SESSION['data_full_description'] = $article_data[$id - 1][7];
$_SESSION['data_src2'] = $article_data[$id - 1][5];

header('Location: full-article.php');

?>