<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>thank you for submitting the following information:</p>

    <?php
        $name = $_POST['name'];
        $age = $_POST['age'];
        echo "<p>name: $name</p><p>age: $age</p>";
        echo '<br><p>have a good day</p>';
    ?>
</body>
</html>

