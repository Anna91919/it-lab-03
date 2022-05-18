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
            .navbar{
                z-index: 3;
            }
            .article-img{
                width: 400px;
                height: 250px;
                margin: 0;
                z-index: 0;
            }
            #holder{
                overflow:hidden;
                position:relative;
            }

            .swControls{
                position:absolute;
                margin-top:10px;
            }
            a.swShowPage{
                background-color:#444444;
                float:left;
                height:15px;
                margin:4px 3px;
                text-indent:-9999px;
                width:15px;
                -moz-border-radius:7px;
                -webkit-border-radius:7px;
                border-radius:7px;
            }
            a.swShowPage:hover,
            a.swShowPage.active{
                background-color:#2993dd;
            }
            .clear{
                clear:both;
            }

            .navigate{
                position: relative; 
                left: 45%;
                float: Inline-block;
            }
            .navigate span:hover { 
                text-decoration: underline;
                margin-left: 5px; 
            }
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