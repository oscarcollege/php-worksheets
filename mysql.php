<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {

        $conn = new mysqli($servername, $username, $password, "phpmyadmin");

    } catch (Exception $ex) {
        header('Location: http://localhost/php/error-page.html');
    }

    echo "connected successfully";
    ?>
</body>
</html>