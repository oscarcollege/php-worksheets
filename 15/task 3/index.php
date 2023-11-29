<?php
$basket = array();

if (! isset($_COOKIE['basket'])) {
    setcookie('basket', serialize(array()), time() + 86400);
}

if (isset($_GET['add'])) {
    $basket = unserialize($_COOKIE['basket']);
    $basket[] = $_GET['add'];
    setcookie('basket', serialize($basket), time() + 86400);
    echo "basket " . $_COOKIE['basket'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <list>
        <li>
            <form method="get">
                <span>item 1</span>
                <input type="hidden" name="add" value="item1">
                <input type="submit" value="add to basket">
            </form>
        </li>
        <li>
            <form method="get">
                <span>item 2</span>
                <input type="hidden" name="add" value="item2">
                <input type="submit" value="add to basket">
            </form>
        </li>
        <li>
            <form method="get">
                <span>item 3</span>
                <input type="hidden" name="add" value="item3">
                <input type="submit" value="add to basket">
            </form>
        </li>
        <li>
            <form method="get">
                <span>item 4</span>
                <input type="hidden" name="add" value="item4">
                <input type="submit" value="add to basket">
            </form>
        </li>
        <li>
            <form method="get">
                <span>item 5</span>
                <input type="hidden" name="add" value="item5">
                <input type="submit" value="add to basket">
            </form>
        </li>
    </list>

    <h1>your basket:</h1>
    <?php while ($row=$result->fetch_array(MYSQLI_ASSOC)): ?>
</body>
</html>