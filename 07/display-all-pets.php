<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new mysqli($servername, $username, $password, "pets");
} catch (Exception $ex) {
    header('Location: http://localhost/php/error-page.html');
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
    <table class="w-full">
        <thead>
            <tr class="uppercase tracking-wide border-b border-gray-600 text-left">
                <th class="px-4 py-3 border-t border-l border-gray-600">ID</th>
                <th class="px-4 py-3 border-t border-gray-600">Name</th>
                <th class="px-4 py-3 border-t border-gray-600">Age</th>
                <th class="px-4 py-3 border-t border-r border-gray-600">Type</th>
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
                </tr>
            <?php endwhile;

            $result->free_result();
            $conn->close();
            ?>
        <tbody>
    </table>
</body>
</html>