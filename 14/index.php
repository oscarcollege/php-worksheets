<?php
if (isset($_GET['guess'])) {
    setcookie("guess", $_GET['guess'], time() + 60*60*24);
    if ($_COOKIE['guess'] != $_GET['guess']) {        
        header("Refresh:0");
    }
}

if (! isset($_COOKIE["target"])) {
    echo "Welcome to the guessing game";
    echo "<br>";
    echo "cookie isn't set";

    $seconds_in_a_day = 60 * 60 * 24;
    setcookie("target", rand(1,100), time() + $seconds_in_a_day);
    setcookie('guess', '0', time() + $seconds_in_a_day);
    setcookie("username", "anonymous", time() + $seconds_in_a_day);
    die();
} else {
    echo "cookie is set";
    echo "<br>";
    echo "target value is: {$_COOKIE['target']}";
    echo "<br>";
    echo "guess value is: {$_COOKIE['guess']}";
    echo "<br>";
    echo "username value is: {$_COOKIE['username']}";
    echo "<br>";
    echo "<a href='index.php?clear=1'>remove cookies</a>";
}

if (isset($_GET['clear'])) {
    if (isset($_COOKIE['target'])) {
        setcookie('target', '', time());
        setcookie('guess', '', time());
        setcookie('username', '', time());
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>number guessing game with cookies</title>
</head>
<body>
    <?php
    echo "<p>your last guess was {$_COOKIE['guess']}</p>";
    if ($_COOKIE['target'] == $_COOKIE['guess']) {
        echo "you are correct!";
    } else if ($_COOKIE['target'] > $_COOKIE['guess']) {
        echo "your guess was too low";
    } else {
        echo "your guess was too high";
    }
    ?>

    <form method="GET" action=''>
        <label for="guess">enter your new guess:</label>
        <input type="number" name="guess">
        <input type="submit">
    </form>
</body>
</html>