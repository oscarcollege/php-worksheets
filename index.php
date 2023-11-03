<!DOCTYPE html> 
<html> 
<head> 
    <title>PHP Variables</title> 
</head> 
<body> 
    <?php 
        $firstName = 'Jeff'; 
        $lastName = 'Jones'; 
        $fullName = "$firstName $lastName"; 
        echo "<p>hello <strong>$fullName</strong></p>";

        header('Location: http://localhost/php/index.html');
    ?> 
</body> 
</html>


