<?php

$connect = mysqli_connect('localhost','root','','test');

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<table>
    <?php
    $res = $connect->query("SELECT count(*) FROM users WHERE email LIKE '%mail.ru'");
    $row = $res->fetch_row();
    $countM = $row[0];

    $res = $connect->query("SELECT count(*) FROM users WHERE email LIKE '%yahoo.com'");
    $row1 = $res->fetch_row();
    $countY = $row1[0];

    $res = $connect->query("SELECT count(*) FROM users WHERE email LIKE '%gmail.com'");
    $row2 = $res->fetch_row();
    $countG = $row2[0];

    ?>
    <tr>
        <th>ID</th>
        <th><a href="categories_name.php" style="color: ghostwhite">Sort by name</a></th>
        <th><a href="categories_date_desc.php" style="color: ghostwhite">Sort by date</a></th>
        <th><a href="ct_mail.php"> Mail <?php echo $countM; ?> </a></th>
        <th><a href="ct_mail1.php"> Yahoo <?php echo $countY; ?> </a></th>
        <th><a href="ct_mail2.php"> Gmail <?php echo $countG; ?> </a></th>
    </tr>

    <?php
    $select = mysqli_query($connect, "SELECT * FROM users WHERE email LIKE '%mail.ru' ORDER BY date_time DESC ");

    //$mail = "vi6.9@mail.ru";
    //$mail = mysqli_query($connect, "SELECT email FROM users");

    //  $isMatched = preg_match('/@mail.ru/', $mail, $matches);
    // var_dump($isMatched, $matches);

    while($data = mysqli_fetch_assoc($select)){
        ?>
        <tr>
            <td><?php echo $data["id"]; ?></td>
            <td><?php echo $data["email"]; ?></td>
            <td><?php echo $data["date_time"]; ?></td>
            <td><a style="color: red" href="includes/delete.php?id=<?= $data["id"]; ?>">Удалить</a></td>
        </tr>
        <?php
    }
    ?>
</table>



</body>
</html>

