<?php
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = ? AND `password` = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: index.html");
    } else {
        echo "Incorrect username or password";
    }

    $stmt->close();
}
$conn->close();
