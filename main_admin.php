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
            
            .delete_category {
                border: none;
                background: none;
                font-size: 20;
                color:red;
                font-weight: 100px;
            }
            .add_category{
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.563);
                width: 300px;
                height: 25px;
                margin: 10px;
                padding-top: 5px;
                text-align: center;
                font-family: arial;
                border-radius: 10px;
                float: left;
                cursor: pointer;
            }
            .add_category input{
                font-family: arial;
                border-radius: 1px;
            }
            .add_category button{
                border: none;
                outline: 0;
                padding: 2px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 80px;
                font-size: 14px;
                margin-bottom: 8px;
                border-radius: 5px;
            }
            .hide_article{
                border: none;
                background-color: rgba(254,0,0,0.1);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.563);
                width: 100px;
                height: 25px;
                margin-top: 20px;
                margin-left: 47%;
                padding: 5px;
                text-align: center;
                font-family: arial;
                border-radius: 10px;
                cursor: pointer;
                font-size: 14;
                color:red;
                font-weight: 100px;
            }

            .show_article{
                border: none;
                background-color: rgba(0,102,255,0.1);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.563);
                width: 100px;
                height: 25px;
                margin-top: 20px;
                margin-left: 47%;
                padding: 5px;
                text-align: center;
                font-family: arial;
                border-radius: 10px;
                cursor: pointer;
                font-size: 14;
                font-weight: 100px;
            }

        </style>
	</head>
	<body> 
        <div class="header">
            <h1>NEWS.RU</h1>
            <p>Новости</p>
        </div>
        <div class="navbar">
            <a href="main_admin.php" class="active">Главная</a>
            <a href="report.php" class="active">Статистика</a>
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
        
        <form action="L3_server_add_category.php" method="get" class='add_category'>
            <input type="text" name="new_category" placeholder="Название категории">
            <button type="submit">Добавить</button>
        </form>

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
        
        <script src="load_from_database_admin.js"></script>
        <script src="navigator.js"></script>
        <script src="category.js"></script>
        <script src="delete_category.js"></script>
        <script src="hide_article.js"></script>
        <script src="show_article.js"></script>
	</body>
</html>