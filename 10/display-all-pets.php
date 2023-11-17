<?php
include "library/db.php";

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new mysqli($servername, $username, $password, "pets");
} catch (Exception $ex) {
    header('Location: http://localhost/php-worksheets/error-page.html');
}

$last_search = "";

if (isset($_POST['search'])) {
    $last_search = $_POST['search'];
    $result = find_pet($last_search, $conn);
} else {
    $sql = "SELECT * FROM pets";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display all pets</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 px-60 py-10 mx-auto">

    <form action="#" method="POST">
        <span class="flex mb-4 p-0.5 w-full bg-black text-sm text-gray-400 border border-gray-700">
            <a href="./display-all-pets.php" class="cursor-pointer"><img src="images/magnifier.png" class="flex-inline w-5 h-5 p-0.5 mr-1"></a>
            <input type="text" name="search" value="<?=$last_search?>" class="flex-inline focus:outline-none w-full bg-black">
        </span>
    </form>

    <table class="w-full">
        <thead>
            <tr class="uppercase text-gray-400 tracking-wide text-left">
                <span class="flex">
                    <th class="px-4 py-3 border-y border-gray-600 border-l flex-inline">ID</th>
                    <img src="images/arrow.png" class="w-4 h-4 flex-inline">
                </span>
                <th class="px-4 py-3 border-y border-gray-600">Name</th>
                <th class="px-4 py-3 border-y border-gray-600">Age</th>
                <th class="px-4 py-3 border-y border-gray-600">Type</th>
                <th class="px-4 py-3 border-y border-gray-600">#</th>
                <th class="px-4 py-3 border-y border-gray-600 border-r"></th>
            </tr>
        <thead>

        <tbody>
            <?php
            while ($row=$result->fetch_array(MYSQLI_ASSOC)): ?>
                <tr class="text-gray-400 bg-black">
                    <td class="px-4 py-3 border border-gray-700"><?=$row['id']?></td>
                    <td class="px-4 py-3 border border-gray-700"><?=$row['name']?></td>
                    <td class="px-4 py-3 border border-gray-700"><?=$row['age']?></td>
                    <td class="px-4 py-3 border border-gray-700"><?=$row['type']?></td>
                    <td class="px-4 py-3 border border-gray-700"><a href="edit.php?id=<?=$row["id"]?>" class="bg-green-800 hover:bg-green-600 hover:text-gray-200 pt-1 pb-1 pl-3 pr-3 rounded text-gray-400">Edit</a></td>
                    <td class="px-4 py-3 border border-gray-700"><a href="delete-action.php?id=<?=$row["id"]?>" class="bg-blue-800 hover:bg-blue-600 hover:text-gray-200 pt-1 pb-1 pl-3 pr-3 rounded text-gray-400">Delete</a></td>
                </tr>
            <?php endwhile;

            $result->free_result();
            $conn->close();
            ?>

        <tbody>
    </table>

    <?php if(isset($_GET['msg']) && $_GET['msg']=='edit-success'): ?>
        <div class="border-green-800 bg-green-400 text-green text-sm inline-flex p-2 mt-2 rounded">
            <a href="./display-all-pets.php" class="cursor-default">Updated successfully</a>
        </div>
    <?php endif ?>

    <?php if(isset($_GET['msg']) && $_GET['msg']=='add-success'): ?>
        <div class="border-green-800 bg-green-400 text-green text-sm inline-flex p-2 mt-2 rounded cursor-default">
        <a href="./display-all-pets.php" class="cursor-default">Added pet successfully</a>
        </div>
    <?php endif ?>

    <div class="pt-5">
        <a class="px-4 py-3 bg-green-600 hover:bg-green-700 rounded text-green" href="add-a-pet.php">Add a pet</a>
    </div>

</body>
</html>