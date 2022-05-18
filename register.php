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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
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

    <!-- Форма регистрации -->

    <form action="L3_server_register.php" method="post" enctype="multipart/form-data">
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите свое полное имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Регистрация</button>
        <p>
            У вас уже есть аккаунт? - <a href="signup.php">авторизируйтесь</a>!
        </p>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                unset($_SESSION['message']);
            }
        ?>
    </form>

</body>
</html>