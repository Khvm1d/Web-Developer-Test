<?php
    session_start();


    $connect = mysqli_connect('localhost','root','','test');

    $login = $_POST['login'];
    $password = md5($_POST['password']);


    //$check_user =mysqli_query($connect, "SELECT * FORM `users` WHERE `login` = '$login' AND 'password' = '$password'") ;

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    echo mysqli_num_rows($check_user);

    if (mysqli_num_rows($check_user) > 0)
    {
        $user = mysqli_fetch_assoc($check_user);


        $_SESSION['user'] = [
            "id" => $user['id'],

            "name" => $user['name'],
            "email" => $user['email']
        ];

        header('Location: ../categories.php');
    }
    else
    {
        $_SESSION['message'] = 'Не верный логин или пароль!';
        header('Location: ../index.php');
    }

    ?>

