<?php
    session_start();

    $mysql = new mysqli('localhost','root','','test');

    $email = $_POST['email'];

    if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)) {

        $connect =mysqli_connect('localhost','root','','test');
        mysqli_query($connect, "INSERT INTO `users` (`id`, `email`, `date_time`) VALUES (NULL,'$email', NOW())");

        header('Location: ../complete.html');

    }else{
        echo "Адрес указан не правильно.";
    }
/*
        $connect =mysqli_connect('localhost','root','','test');
        mysqli_query($connect, "INSERT INTO `users` (`id`, `email`, `date_time`) VALUES (NULL,'$email', NOW())");

    header('Location: ../categories.php');
*/


?>


