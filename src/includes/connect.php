<?php

    session_start();
    $connect = mysqli_connect('localhost','root','','test');
    if (!$connect)
    {
        die('Error connect to DataBase!!!');
    }

?>
