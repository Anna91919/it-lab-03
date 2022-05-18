<?php
session_start();

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['admin'])
    {
        header('Location: main_admin.php');
    }

    header('Location: main.php');
}

?>

<!doctype html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="styles_login.css">
    <style>
        body{
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial;
        }

        form{
            display: flex;
            flex-direction: column;
            padding: 10px;
            border-radius:10px;
            border: 1px LightGray solid;
            width: 370px;
        }

        input{
            margin: 10px 0;
            padding: 10px;
            border: unset;
            border-bottom: 1px LightGray solid;
            outline: none;
        }

        a{
            color: gray;
            font-weight: bold;
            text-decoration: none;
        }

        button{
            /* padding: 10px;
            background: LightGray;
            border: none;
            cursor: pointer;
            border: none; */
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 14px;
            border-radius: 5px;
        }


        button:hover {
            opacity: 0.7;
        }

        .msg{
            border: 2px orange solid;
            margin: 5px;
        }

        p{
            margin: 5px;
        }
    </style>
</head>
<body>
        <!-- Форма авторизации -->
        <form action="L3_server_signup.php" method="post">
            <label>Логин</label>
            <input type="text" name="login" placeholder="Введите логин">
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль">
            <button type="submit">Войти</button>
            <p>Нет аккаунта? <a href="register.php">Зарегестрируйтесь</a>!</p>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                unset($_SESSION['message']);
            }
            ?>
        </form>
</body>
</html>