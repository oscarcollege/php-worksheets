<?php
function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new mysqli($servername, $username, $password, "pets");
    } catch (Exception $ex) {
        header('Location: http://localhost/php-worksheets/error-page.html');
    }

    return $conn;
}

function delete_pet($sid, $conn) {
    $query = "DELETE FROM pets WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();
}

function find_pet($search, $conn) {
    $query = "SELECT * FROM pets WHERE name LIKE ?";
    $stmt = $conn->prepare($query);

    $search = "{$_POST['search']}%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    return $stmt->get_result();
}
?>