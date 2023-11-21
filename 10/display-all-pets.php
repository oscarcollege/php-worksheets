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

if (isset($_POST['sort'])) {
    $sort_by = $_POST['sort'];
    $result = sort_pets("", $sort_by, $conn);
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
<body class="bg-gray-950 px-80 py-20 mx-auto">

    <!--search bar-->
    <form action="#" method="POST">
        <span class="flex mb-4 p-0.5 w-full bg-black text-sm text-gray-400 border border-gray-700">
            <a href="./display-all-pets.php" class="cursor-pointer"><img src="images/magnifier.png" class="w-5 h-5 p-0.5 mr-1"></a>
            <input type="text" name="search" value="<?=$last_search?>" class="focus:outline-none w-full bg-black">
        </span>
    </form>

    <!--table head-->
    <table class="w-full">
        <thead>
            <tr class="uppercase text-gray-400 tracking-wide text-left">
                <th class="px-4 py-3 border-y border-gray-600 border-l">
                    <form method="POST" id="id-sort" onclick="document.getElementById('id-sort').submit();" class="cursor-pointer">
                        <img src="images/arrowdown.png" class="pt-2 w-4 float-right">
                        <span>ID</span>
                        <input type="hidden" name="sort" value="id" id="id-sort-submit">
                    </form>
                </th>
                <th class="px-4 py-3 border-y border-gray-600">
                    <div>
                        <img src="images/flat.png" class="pt-2 w-4 float-right">
                        <span>Name</span>
                    </div>
                </th>
                <th class="px-4 py-3 border-y border-gray-600">
                    <div>
                        <img src="images/flat.png" class="pt-2 w-4 float-right">
                        <span>Age</span>
                    </div>
                </th>
                <th class="px-4 py-3 border-y border-gray-600">
                    <div>
                        <img src="images/flat.png" class="pt-2 w-4 float-right">
                        <span>Type</span>
                    </div>
                </th>
                <th class="px-4 py-3 border-y border-gray-600">#</th>
                <th class="px-4 py-3 border-y border-gray-600 border-r"></th>
            </tr>
        </thead>

        <!--table body-->
        <tbody>
            <?php
            while ($row=$result->fetch_array(MYSQLI_ASSOC)): ?>
                <tr class="text-gray-400 bg-black">
                    <td class="px-4 py-3 border border-gray-700"><?=$row['id']?></td>
                    <td class="px-4 py-3 border border-gray-700"><?=$row['name']?></td>
                    <td class="px-4 py-3 border border-gray-700"><?=$row['age']?></td>
                    <td class="px-4 py-3 border border-gray-700"><?=$row['type']?></td>
                    <td class="px-4 py-3 border border-gray-700">
                        <a href="edit.php?id=<?=$row["id"]?>" class="bg-green-800 hover:bg-green-600 hover:text-gray-200 pt-1 pb-1 pl-3 pr-3 rounded text-gray-400">Edit</a>
                    </td>
                    <td class="px-4 py-3 border border-gray-700">
                        <a href="delete-action.php?id=<?=$row["id"]?>" class="bg-red-800 hover:bg-red-600 hover:text-gray-200 pt-1 pb-1 pl-3 pr-3 rounded text-gray-400">Delete</a>
                    </td>
                </tr>
            <?php endwhile;

            $result->free_result();
            $conn->close();
            ?>

        </tbody>
    </table>

    <?php if(isset($_GET['msg']) && $_GET['msg']=='edit-success'): ?>
        <div class="border-green-800 bg-gray-800 text-gray-400 text-sm inline-flex p-2 mt-2 rounded cursor-pointer">
            <a href="./display-all-pets.php">Updated successfully</a>
        </div>
    <?php endif ?>

    <?php if(isset($_GET['msg']) && $_GET['msg']=='add-success'): ?>
        <div class="border-green-800 bg-gray-800 text-gray-400 text-sm inline-flex p-2 mt-2 rounded cursor-pointer">
            <a href="./display-all-pets.php">Added pet successfully</a>
        </div>
        <!--<img src="images/x.png" class="w-4 flex">-->
        <!--<span class="text-red-800 cursor-pointer border border-red-800 py-1 px-2">X</span>-->
    <?php endif ?>

    <?php if(isset($_GET['msg']) && $_GET['msg']=='delete-success'): ?>
        <div class="border-green-800 bg-gray-800 text-gray-400 text-sm inline-flex p-2 mt-2 rounded cursor-pointer">
            <a href="./display-all-pets.php">Deleted pet successfully</a>
        </div>
    <?php endif ?>

    <div class="pt-5">
        <a class="px-4 py-3 bg-green-800 hover:bg-green-600 hover:text-gray-200 rounded text-gray-400" href="add-a-pet.php">Add a pet</a>
    </div>

</body>
<script src="js/js.js"></script>
</html>