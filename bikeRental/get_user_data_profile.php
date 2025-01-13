<?php
// This file is responsible for fetching the user data from the database
require_once 'connection.php';

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE EMAIL = '$email'";
$result = mysqli_query($con, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "Error fetching user details: " . mysqli_error($con);
    exit();
}

mysqli_close($con);
?>
