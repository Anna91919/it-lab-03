<?php
    session_start();

    $login = $_POST['login'];
    $password = $_POST['password'];

    $users=array();
    $f=fopen('users.csv','r');
    while (!feof($f))
    {	$u = fgetcsv($f,10000,';');
        $users[]=$u;
    }
    fclose($f);

    $file = file('users.csv');

    $signin = FALSE;
    $i = 1;
    while($i < count($users))
    {
        if ($users[$i][2] === $login AND $users[$i][4] === $password)
        {
            $signin = TRUE;
            $u = explode(';', $file[$i]);

            $_SESSION['user'] = [
                "id" => $u[0],
                "full_name" => $u[1],
                "email" => $u[3]
            ];
            
            if ($u[5] === "1\n")
            {
                $_SESSION['user']['admin'] = TRUE;
                header('Location: main_admin.php');
            }
            else
            {
                $_SESSION['user']['admin'] = FALSE;
                header('Location: main.php');
            }
        }
        $i++;
    }

    if(!$signin)
    {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: signup.php');
    }
?>
