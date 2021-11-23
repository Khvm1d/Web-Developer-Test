<?php

$connect = mysqli_connect('localhost','root','','test');


$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'");

header('Location: ../categories.php');
?>