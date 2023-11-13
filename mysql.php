<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // set up variables
    $servername = "localhost";
    $username = "root";
    $password = "";

    // use a try block so that if the connection fails, it goes to the except block instead of stopping althogether
    try {

        // connect to the database with a varaible
        $conn = new mysqli($servername, $username, $password, "phpmyadmin");

    // in case it fails, run this block of code with the variable 'ex' being the exception that was raised
    } catch (Exception $ex) {
        // go to this webpage
        header('Location: http://localhost/php/error-page.html');
    }

    // print 'connected successfully' to the screen
    echo "connected successfully";
    ?>
</body>
</html>

