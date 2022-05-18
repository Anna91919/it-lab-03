<?php
    session_start();

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {

        $file = file('users.csv');
        $id = count($file);

        $file = fopen('users.csv', 'a');
        fputcsv($file, array($id, $full_name, $login, $email, $password, 0), ';');
        fclose($file);
        
        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: signup.php');

    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: register.php');
    }
?>
