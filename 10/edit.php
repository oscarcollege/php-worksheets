<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new mysqli($servername, $username, $password, "pets");
} catch (Exception $ex) {
    header('Location: http://localhost/php-worksheets/error-page.html');
}

$sql = "SELECT * FROM pets WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$row = $stmt->execute();
$result = $stmt->get_result();
$pet = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="font-black uppercase text-xl">Edit <?=$pet['name']?></h1>
    <form action="edit-action.php" method="POST">
        <label for="name">Name: </label>
        <input type="text" name="name" value="<?=$pet["name"]?>" class="border border-black m-1">
        <br>

        <label for="age">Age: </label>
        <input type="text" name="age" value="<?=$pet["age"]?>" class="border border-black m-1">
        <br>

        <label for="type">Type: </label>
        <input type="text" name="type" value="<?=$pet["type"]?>" class="border border-black m-1">
        <br>

        <input type="submit" value="Update" class="border border-black bg-gray-200 mt-1 rounded pl-1 pr-1 hover:bg-gray-300">

        <input type="hidden" name="id" value="<?=$pet["id"]?>">
    </form>

    <?php if(isset($_GET['msg']) && $_GET['msg']=='success'): ?>
        <div class="border-green-800 bg-green-400 text-green-900 text-sm inline-flex p-2 mt-2 rounded">
            Updated successfully
        </div>
    <?php endif ?>
</body>
</html>

<?php
$result->free_result();
$conn->close();
?>