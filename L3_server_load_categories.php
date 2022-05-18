<?php
    $categories=array();
    $categories=file('categories.csv');

    foreach($categories as $category)
    {
        $category_name = trim($category, '"');
        include "template_categories.html";
    }

?>