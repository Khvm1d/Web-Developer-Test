<?php

    $connect = mysqli_connect('localhost','root','','test');

    $product_id = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id`= '$product_id' ");
    $product = mysqli_fetch_assoc($product);

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>

<h3>Изменить библиотеку.</h3>
<form action="includes/update.php" method="post">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <p>Заголовок</p>
    <input type="text" name="title" value="<?= $product['tittle'] ?>">
    <p>Описание</p>
    <textarea name="description"><?= $product['description'] ?></textarea>
    <p>Номер категории</p>
    <input type="number" name="number" value="<?= $product['parent_id'] ?>" ><br><br>
    <button type="submit">Обновить товар.</button>
</form>


</body>
</html>

