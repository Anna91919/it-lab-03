<?php
    session_start();
?>

<!DOCTYPE html lang="ru">
<html>
	<head>
		<meta charset="utf-8" />
        <title>NEWS.RU</title>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="styles.css">
        <style>
            .delete_category{
                display: none;
            }
        </style>
	</head>
	<body> 
        <div class="header">
            <h1>NEWS.RU</h1>
            <p>Новости</p>
        </div>
        <div class="navbar">
            <a href="main.php" class="active">Главная</a>
            <?php 
                echo "<a>";
                echo trim($_SESSION['user']['full_name'], '"');
                echo "</a>";
            ?>
            <a href="L3_server_logout.php">Выйти</a>
            </div>
        </div>

        <?php
            $categories=array();
            $categories=file('categories.csv');

            foreach($categories as $category)
            {
                $category_name = trim($category, '"');
                include "template_categories.html";
            }

        ?>

        </br></br></br>
        <div class="navigate">
            <p>Отображать по 
                <span onclick="navigator(1)">1,</span> 
                <span onclick="navigator(2)">2,</span> 
                <span onclick="navigator(3)">3,</span>
                <span onclick="navigator(100)">все</span> 
            </p>
        </div>

        <div id="output"></div>       
        
        <script src="category.js"></script>
        <script src="load_from_database_user.js"></script>
        <script src="navigator.js"></script>
	</body>
</html>