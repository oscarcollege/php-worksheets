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
<body class="bg-gray-950">

    <?php include "partials/menu.php"; ?>

    <div class="mx-auto container w-1/2">
        <div class="p-4 bg-black">
            <div class="w-auto mx-10">
                <h1 class="text-lg font-bold text-white">Edit <?=$pet['name']?></h1>
                <form class="flex flex-col mt-4" method="post" action="edit-action.php">
                    <input type="text" name="name" placeholder="Enter pets name" value="<?=$pet['name']?>" class="px-4 py-3 rounded-md bg-gray-600 border-transparent focus:border-gray-500 focus:bg-gray-600 focus:ring-0 text-sm text-white">
                    <input type="text" name="age" placeholder="Enter pets age" value="<?=$pet['age']?>" class="px-4 py-3 mt-3 rounded-md bg-gray-600 border-transparent focus:border-gray-500 focus:bg-gray-600 focus:ring-0 text-sm text-white">
                    <input type="text" name="type" placeholder="Enter the type of pet" value="<?=$pet['type']?>" class="px-4 py-3 mt-3 rounded-md bg-gray-600 border-transparent focus:border-gray-500 focus:bg-gray-600 focus:ring-0 text-sm text-white">
                    <input type="hidden" name="id" value="<?=$pet["id"]?>">
                    <button type="submit" class="px-4 py-3 mt-3 rounded-md border border-transparent leading-6 text-base text-white focus:outline-none bg-blue-500 text-blue-100 hover:text-white focus:ring-offset-2 cursor-pointer inline-flex items-center w-full justify-center font-medium focus:outline-none">Submit</button>
                </form>
            </div>
        </div>
    </div>
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