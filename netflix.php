<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (sizeof($_POST) == 0) {
            echo <<<E0D
            <h1>sign up</h1>
            <form method="POST" action="#">
                <label for="username">username:</label>
                <input type="text" name="username"><br>
        
                <label for="tier">enter tier:</label>
                <select name="tier">
                    <option value="tier1">tier 1 (£4.99/month)</option>
                    <option value="tier2">tier 2 (£9.99/month)</option>
                </select><br>
        
                <label for="dayofmonth">enter day of month:</label>
                <input type="number" name="dayofmonth"><br>
        
                <button type="submit">submit</button>
            </form>
            E0D;

        } elseif (!in_array('olddayofmonth', $_POST)) {
            $username = $_POST['username'];
            $tier = $_POST['tier'];
            $dayofmonth = $_POST['dayofmonth'];
            
            echo <<<E0D
            <h1>change tier</h1>
            <p>old tier: $tier</p>
            <form method="POST" action="#">
                <input type="hidden" name="oldtier" value="$tier">
                <input type="hidden" name="olddayofmonth" value="$dayofmonth">
        
                <label for="tier">enter tier:</label>
                <select name="tier">
                    <option value="tier1">tier 1 (£4.99/month)</option>
                    <option value="tier2">tier 2 (£9.99/month)</option>
                </select><br>
        
                <label for="dayofmonth">enter day of month:</label>
                <input type="number" name="dayofmonth"><br>
        
                <button type="submit">submit</button>
            </form>
            E0D;
        } elseif (!in_array('username', $_POST)) {
            $olddayofmonth = $_POST['olddayofmonth'];
            $dayofmonth = $_POST['dayofmonth'];
            $tier = $_POST['oldtier'];

            if ($tier == "tier1") {
                $costperday = 4.99 / 31;
            } elseif ($tier == "tier2") {
                $costperday = 9.99 / 31;
            }

            $numdays = $dayofmonth - $olddayofmonth;

            $totalcost = $numdays * $costperday;

            echo "<p>your first bill is $totalcost</p>";
        }
    ?>
</body>
</html>