<?php
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminUsername = $_POST['username'];
    $adminPassword = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE `username` = ? AND `password` = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $adminUsername, $adminPassword);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: admindashboard.html");
    } else {
        echo "Incorrect admin username or password";
    }

    $stmt->close();
}
$conn->close();
?>
