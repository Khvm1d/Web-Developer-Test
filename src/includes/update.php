<?php

$connect = mysqli_connect('localhost','root','','test');

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$parent_id = $_POST['number'];

mysqli_query($connect, "UPDATE `products` SET `tittle` = '$title', `description` = '$description', `parent_id` = '$parent_id' WHERE `products`.`id` = '$id'");

header('Location:../categories.php')
?>

