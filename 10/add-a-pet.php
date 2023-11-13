<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add a pet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <?php include "partials/menu.php"; ?>

    <form action="add-a-pet-action.php" method="post">
        <label for="name">enter your pets name:</label>
        <input type="text" name="name"><br>

        <label for="age">enter your pets age:</label>
        <input type="number" name="age"><br>

        <label for="type">enter your pets type:</label>
        <input type="text" name="type"><br>

        <button type="submit">submit form</button>
    </form>
</body>
</html>

