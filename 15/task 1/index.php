<?php
session_start();

if (isset($_GET['guess'])) {
    $_SESSION['guess'] = $_GET['guess'];
}

if (! isset($_SESSION["target"])) {
    echo "Welcome to the guessing game";
    echo "<br>";
    echo "session isn't set";

    $seconds_in_a_day = 60 * 60 * 24;
    $_SESSION['target'] = rand(1,100);
    $_SESSION['guess'] = '0';
    $_SESSION['username'] = 'anonymous';
    die();
} else {
    echo "session is set";
    echo "<br>";
    echo "target value is: {$_SESSION['target']}";
    echo "<br>";
    echo "guess value is: {$_SESSION['guess']}";
    echo "<br>";
    echo "username value is: {$_SESSION['username']}";
    echo "<br>";
    echo "<a href='index.php?clear=1'>remove sessions</a>";
}

if (isset($_GET['clear'])) {
    if (isset($_SESSION['target'])) {
        session_destroy();
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>number guessing game with sessions</title>
</head>
<body>
    <?php
    echo "<p>your last guess was {$_SESSION['guess']}</p>";
    if ($_SESSION['target'] == $_SESSION['guess']) {
        echo "you are correct!";
    } else if ($_SESSION['target'] > $_SESSION['guess']) {
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