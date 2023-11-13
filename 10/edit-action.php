<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Action</title>
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
    echo "connected successfully";

    $query = "UPDATE pets SET name=?, age=?, type=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $_POST['name'], $_POST['age'], $_POST['type'], $_POST['id']);
    $stmt->execute();

    header("Location: http://localhost/php-worksheets/08/edit.php?id={$_POST['id']}&msg=success");
    ?>
</body>
</html>