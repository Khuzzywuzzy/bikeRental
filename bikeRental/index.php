<!–– Code author : Muhammad Aqqil Haziq ––>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BIKE RENTAL</title>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
</head>
<body>

<?php
require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

// Function to validate user credentials
function validateUser($email, $pass, $con) {
    if (empty($email) || empty($pass)) {
        echo '<script>alert("Please fill in all fields")</script>';
        return false;
    }

    $query = "SELECT * FROM users WHERE EMAIL='$email'";
    $res = mysqli_query($con, $query);
    
    if ($row = mysqli_fetch_assoc($res)) {
        // Check password using md5 (not recommended for production; use bcrypt or other secure hashing)
        if (md5($pass) == $row['PASSWORD']) {
            return true;
        } else {
            echo '<script>alert("Incorrect password")</script>';
        }
    } else {
        echo '<script>alert("No user found with this email")</script>';
    }
    return false;
}

// Handle login form submission
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (validateUser($email, $pass, $con)) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: menu.php"); // Redirect after successful login
        exit;
    }
}
?>

<div class="index">
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">BIKE RENTAL</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="aboutus.html">ABOUT</a></li>
                <li><a href="contact.html">CONTACT</a></li>
                <li><button class="adminbtn"><a href="adminlogin.php">ADMIN LOGIN</a></button></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <h1>Book Your <br><span>Bicycle Here!</span></h1>
        <p class="par">Wanna bike ride with me?<br>
            They say you never forget how to ride a bike.<br> Let's find out if that's true.</p>
        <button class="cn"><a href="register.php">JOIN US</a></button>
        <div class="form">
            <h2>Login Here</h2>
            <form method="POST">
                <input type="email" name="email" placeholder="Email" style="padding-left: 10px;">
                <input type="password" name="pass" placeholder="Password" style="padding-left: 10px;">
                <input class="btnn" type="submit" value="Login" name="login">
            </form>
            <p class="link">Don't have an account?<br>
            <a href="register.php">Sign up</a> here</p>
        </div>
    </div>
</div>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>
</html>
