<?php
include "library/db.php";

$conn = connect();

$show_results = false;
$user_search_string = "";

if (isset($_POST['search'])) {
    $show_results = true;
    $result = find_pet($_POST['search'], $conn);
    $user_search_string = $_POST['search'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300 w-full">
    
    <?php include "partials/menu.php"; ?>

    <form action="search.php" method="POST" class="mt-5 mb-5">
        <label>Enter pets name: </label>
        <input type="text" name="search" value="<?=$user_search_string?>" class="border border-black rounded">
        <input type="Submit" value="Find" class="border border-black bg-gray-600 pl-1 pr-1 rounded text-white hover:bg-gray-800">
    </form>

    <?php if ($show_results): ?>
        <table class="w-full">
            <tr class="uppercase tracking-wide border-b border-gray-600 text-left">
                <th class="px-4 py-3 border-t border-gray-600 border-l">ID</th>
                <th class="px-4 py-3 border-t border-gray-600">Name</th>
                <th class="px-4 py-3 border-t border-gray-600">Age</th>
                <th class="px-4 py-3 border-t border-gray-600">Type</th>
                <th class="px-4 py-3 border-t border-gray-600">#</th>
                <th class="px-4 py-3 border-t border-gray-600 border-r"></th>
            </tr>

            <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
                <tr>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><?= $row['id'] ?></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><?= $row['name'] ?></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><?= $row['age'] ?></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><?= $row['type'] ?></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><a href="edit.php?id=<?= $row["id"]?>" class="bg-green-600 pt-1 pb-1 pl-3 pr-3 rounded text-white">Edit</a></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><a href="delete-action.php?id=<?= $row["id"]?>" class="bg-blue-600 pt-1 pb-1 pl-3 pr-3 rounded text-white">Delete</a></td>
                </tr>
            <?php endwhile; ?>

        </table>

    <?php endif ?>
</body>
</html>

