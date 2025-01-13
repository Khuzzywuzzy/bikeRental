<! –– Code author : Danneal Kendrick ––>

<?php
require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $stud_num = mysqli_real_escape_string($con, $_POST['stud_num']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']); // Added line for gender

    // Update profile information including gender
    $sqlUpdateInfo = "UPDATE users SET NAME='$name', STUD_NUM='$stud_num', PHONE_NUMBER='$phone_number', GENDER='$gender' WHERE EMAIL='$email'";
    $resultUpdateInfo = mysqli_query($con, $sqlUpdateInfo);

    if (!$resultUpdateInfo) {
        // Redirect with error message for profile information update
        header("Location: profile.php?error=" . urlencode(mysqli_error($con)));
        exit();
    }

    // Redirect with success message for profile information update
    header("Location: profile.php?success=1");
    exit();
}

mysqli_close($con);
?>
