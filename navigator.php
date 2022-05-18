<?php
function link_bar($page, $pages_count)
{
for ($j = 1; $j <= $pages_count; $j++)
{
// Вывод ссылки
if ($j == $page) {
echo ' <a style="color: #808000;" ><b>'.$j.'</b></a> ';
} else {
echo ' <a style="color: #808000;" href='.$_SERVER['php_self'].'?page='.$j.'>'.$j.'</a> ';
}
// Выводим разделитель после ссылки, кроме последней
// например, вставить "|" между ссылками
if ($j != $pages_count) echo ' ';
}
return true;
} // Конец функции

?>