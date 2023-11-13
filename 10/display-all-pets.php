<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new mysqli($servername, $username, $password, "pets");
} catch (Exception $ex) {
    header('Location: http://localhost/php-worksheets/error-page.html');
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

    <table class="w-full">
        <thead>
            <tr class="uppercase tracking-wide border-b border-gray-600 text-left">
                <th class="px-4 py-3 border-t border-gray-600 border-l">ID</th>
                <th class="px-4 py-3 border-t border-gray-600">Name</th>
                <th class="px-4 py-3 border-t border-gray-600">Age</th>
                <th class="px-4 py-3 border-t border-gray-600">Type</th>
                <th class="px-4 py-3 border-t border-gray-600">#</th>
                <th class="px-4 py-3 border-t border-gray-600 border-r"></th>
            </tr>
        <thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM pets";
            $result = $conn->query($sql);

            while ($row=$result->fetch_array(MYSQLI_ASSOC)): ?>
                <tr>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><?=$row['id']?></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><?=$row['name']?></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><?=$row['age']?></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><?=$row['type']?></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><a href="edit.php?id=<?=$row["id"]?>" class="bg-green-600 pt-1 pb-1 pl-3 pr-3 rounded text-white">Edit</a></td>
                    <td class="px-4 py-3 border border-gray-600 bg-gray-100"><a href="delete-action.php?id=<?=$row["id"]?>" class="bg-blue-600 pt-1 pb-1 pl-3 pr-3 rounded text-white">Delete</a></td>
                </tr>
            <?php endwhile;

            $result->free_result();
            $conn->close();
            ?>
        <tbody>
    </table>
</body>
</html>