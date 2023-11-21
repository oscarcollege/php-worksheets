<?php

include "library/db.php";

$conn = connect();
delete_pet($_GET['id'], $conn);

header('Location: http://localhost/php-worksheets/10/display-all-pets.php?msg=delete-success');
?>