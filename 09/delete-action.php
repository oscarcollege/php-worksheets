<?php

include "library/db.php";

$conn = connect();
delete_pet($_GET['id'], $conn);

header('Location: http://localhost/php-worksheets/09/display-all-pets-delete.php?msg=delete-success');
?>

