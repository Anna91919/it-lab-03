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
        <link rel="stylesheet" href="style_full_article.css">

	</head>
	<body> 
        <div class="header">
            <h1>NEWS.RU</h1>
            <p>Новости</p>
        </div>
        <div class="navbar">
            <?php 
                if ($_SESSION['user']['admin']){
                    echo '<a href="main_admin.php" class="active">Главная</a>';
                }else{
                    echo '<a href="main.php" class="active">Главная</a>';
                }
            ?>
            
        </div>

        <?php

            $data_date = $_SESSION['data_date'];
            $data_title= $_SESSION['data_title'];
            $data_src1= $_SESSION['data_src1'];
            $data_short_description=$_SESSION['data_short_description'];
            $data_full_description =$_SESSION['data_full_description'];
            $data_src2= $_SESSION['data_src2'];

            include "template_full-article.html";
        ?>

        <div class="comment" style="background-color: black;border-radius: 2px;color:white;">Комментарии</div>

        <span id="output"></span>

        <form action="L3_server_add_comment.php" method="get" class="comment">
            <label>Добавить комментарий</label></br>
            <input type="text" name="comment" placeholder="Напишите комментарий">
            <button type="submit">Добавить</button>
        </form>

        <script>
            let out = $("#output");
                    
            function request(){
                $.ajax({
                    url: "L3_server_load_comments.php"
                }).done(res => {
                    out.html(res);
                });
            }
            
            request();   
        </script>                
            
	</body>
</html>