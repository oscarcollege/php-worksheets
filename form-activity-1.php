<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $fname = $_GET['firstname'];
        $sname = $_GET['surname'];
        $name = $fname . ' ' . $sname;
        $age = $_GET['age'];
        $housenumber = $_GET['housenumber'];
        $street = $_GET['street'];
        $city = $_GET['city'];
        $county = $_GET['county'];
        $postcode = $_GET['postcode'];

        echo "<h1>results</h1>";
        echo "<p>your name is $name</p>";
        echo "<p>your age is $age</p>";
        echo '<p>your address is:</p>';
        echo "<p>$housenumber $street</p>";
        echo "<p>$city</p>";
        echo "<p>$county</p>";
        echo "<p>$postcode</p>";
    ?>
</body>
</html>

