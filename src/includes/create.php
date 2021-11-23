<?php

    $connect = mysqli_connect('localhost','root','','test');

    $title = $_POST['title'];
    $description = $_POST['description'];
    $parent_id = $_POST['number'];

    mysqli_query($connect, "INSERT INTO `products` (`id`, `tittle`, `description`, `parent_id`) VALUES (NULL, '$title', '$description', '$parent_id')");

    header('Location:../categories.php')
?>

