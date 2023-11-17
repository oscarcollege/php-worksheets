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
        $conn = new mysqli($servername, $username, $password, "pets");        
    } catch (Exception $ex) {
        header('Location: http://localhost/php-worksheets/error-page.html');
    }

    echo "successfully connected";

    $query = "INSERT INTO pets (name, age, type) VALUES (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $_POST['name'], $_POST['age'], $_POST['type']);
    $stmt->execute();

    $name = $_POST['name'];

    echo "successfully added $name to the database";

    header('Location: http://localhost/php-worksheets/10/display-all-pets.php?msg=add-success');
    ?>
</body>
</html>