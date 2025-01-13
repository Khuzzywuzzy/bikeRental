<!DOCTYPE html>
<html lang="en">
<head>
    <title>BIKE RENTAL</title>
    <link rel="stylesheet" href="css/regis.css" type="text/css">
</head>
<body>
<?php
require_once 'connection.php';

function isEmpty($data) {
    return empty($data);
}

function validatePassword($password, $confirmPassword) {
    return $password === $confirmPassword;
}

function isEmailExists($email, $con) {
    $sql = "SELECT * FROM users WHERE EMAIL='$email'";
    $res = mysqli_query($con, $sql);
    return mysqli_num_rows($res) > 0;
}

function registerUser($name, $email, $stud_num, $phone_number, $password, $gender, $con) {
    $Pass = md5($password);
    $sql = "INSERT INTO users (NAME, EMAIL, STUD_NUM, PHONE_NUMBER, PASSWORD, GENDER) 
            VALUES ('$name', '$email', '$stud_num', '$phone_number', '$Pass', '$gender')";
    return mysqli_query($con, $sql);
}

if (isset($_POST['regs'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $stud_num = mysqli_real_escape_string($con, $_POST['stud_num']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);

    if (isEmpty($name) || isEmpty($email) || isEmpty($stud_num) || isEmpty($phone_number) || isEmpty($pass) || isEmpty($gender)) {
        echo '<script>alert("Please fill all the fields.")</script>';
    } else {
        if (validatePassword($pass, $cpass)) {
            if (isEmailExists($email, $con)) {
                echo '<script>alert("Email already exists. Please login.")</script>';
                echo '<script>window.location.href = "index.php";</script>';
            } else {
                if (registerUser($name, $email, $stud_num, $phone_number, $pass, $gender, $con)) {
                    echo '<script>alert("Registration successful. Please login.")</script>';
                    echo '<script>window.location.href = "index.php";</script>';
                } else {
                    echo '<script>alert("Please check your connection.")</script>';
                }
            }
        } else {
            echo '<script>alert("Passwords do not match.")</script>';
            echo '<script>window.location.href = "register.php";</script>';
        }
    }
}
?>
<style>
    body {
        background: #ABE7FF;
        background-size: auto;
        background-position: unset;
    }

    input#psw, input#cpsw {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0;
        padding: 7px;
        background-color: #fff;
        box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.3);
    }

    #message {
        display: none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 20px;
        width: 400px;
        margin-left: 1000px;
        margin-top: -500px;
    }

    #message p {
        padding: 10px 35px;
        font-size: 18px;
    }

    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
    }

    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
    }
</style>

<button id="back"><a href="index.php">HOME</a></button>
<h1 id="fam">RENT YOUR BICYCLE NOW!</h1>
<div class="main">
    <div class="register">
        <h2>Register Here</h2>
        <form id="register" action="register.php" method="POST">
            <label>Full Name : </label><br>
            <input type="text" name="name" id="name" placeholder="Enter Your Name" required><br><br>

            <label>Email : </label><br>
            <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                   title="ex: example@ex.com" placeholder="Enter Valid Email" required><br><br>

            <label>Student Number : </label><br>
            <input type="text" name="stud_num" id="stud_num" placeholder="Enter Your Student Number" required><br><br>

            <label>Phone Number : </label><br>
            <input type="tel" name="phone_number" maxlength="12" onkeypress="return onlyNumberKey(event)"
                   id="phone_number" placeholder="Enter Your Phone Number" required><br><br>

            <label>Password : </label><br>
            <input type="password" name="pass" maxlength="12" id="psw" placeholder="Enter Password" required><br><br>

            <label>Confirm Password : </label><br>
            <input type="password" name="cpass" id="cpsw" placeholder="Re-enter the password" required><br><br>

            <label>Gender : </label><br>
            <input type="radio" name="gender" value="Male" id="input_enabled" required> Male
            <input type="radio" name="gender" value="Female" id="input_disabled" required> Female<br><br>

            <input type="submit" class="btnn" value="REGISTER" name="regs">
        </form>
    </div>
</div>

<script>
    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>

</body>
</html>
