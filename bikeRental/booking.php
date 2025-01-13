<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKE RENTAL</title>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }

        setTimeout(preventBack, 0);

        window.onunload = function () { null };
    </script>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #ABE7FF;
            background-position: center;
            background-size: cover;
        }

        .main {
            width: 400px;
            margin: 100px auto 0 auto;
        }

        .btnn {
            width: 240px;
            height: 40px;
            background: #FFB2D8;
            border: none;
            margin-top: 30px;
            margin-left: 30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #000;
            transition: 0.4s ease;
        }

        .btnn:hover {
            background: #ED81DB;
            color: white;
        }

        .btnn a {
            text-decoration: bold;
            color: white;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            padding: 20px;
            font-family: sans-serif;
        }

        .register {
            background-color: #fff;
            width: 100%;
            font-size: 18px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.3);
            color: #000;
        }

        form#register {
            margin: 40px;
            background-color: #fff;
        }

        label {
            font-family: sans-serif;
            font-size: 18px;
            font-style: italic;
        }

        input {
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 3px;
            outline: 0;
            padding: 7px;
            background-color: #fff;
            box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.3);
        }

        .navbar {
            width: 1200px;
            height: 75px;
            margin: auto;
        }

        .logo {
            color: #0E79C8;
            font-size: 26px;
            font-family: 'Tahoma';
            padding-left: 0px;
            float: left;
            padding-top: 35px;
        }

        .menu {
            width: 400px;
            float: left;
            height: 70px;
            color: black;
        }

        ul {
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
        }

        ul li {
            list-style: none;
            margin-left: 80px;
            margin-top: 35px;
            font-size: 14px;
            color: black;
        }

        ul li a {
            text-decoration: none;
            color: black;
            font-family: Arial;
            font-weight: bold;
            transition: 0.4s ease-in-out;
        }

        ul li a:hover {
            color: white;
        }

        .nn {
            width: 100px;
            background: #FFB2D8;
            border: none;
            height: 40px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            transition: 0.4s ease;
        }

        .nn a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .circle {
            border-radius: 48%;
            width: 65px;
        }

        .phello {
            width: 200px;
            margin-left: -50px;
            padding: 0px;
        }

    </style>
</head>
<body>
<?php
    require_once 'connection.php';
    session_start();

    $bike_id = $_GET['id'];
    $bike_query = "SELECT * FROM bikes WHERE BIKE_ID = '$bike_id'";
    $bike_result = mysqli_query($con, $bike_query);
    $bike_data = mysqli_fetch_assoc($bike_result);

    $user_email = $_SESSION['email'];
    $user_query = "SELECT * FROM users WHERE EMAIL = '$user_email'";
    $user_result = mysqli_query($con, $user_query);
    $user_data = mysqli_fetch_assoc($user_result);
    $user_name = $user_data['NAME'];
    $bike_price = $bike_data['PRICE'];

    if (isset($_POST['book'])) {
        $booking_date = date('Y-m-d', strtotime($_POST['date']));
        $duration = mysqli_real_escape_string($con, $_POST['dur']);
        $phone_number = mysqli_real_escape_string($con, $_POST['ph']);

        if (empty($booking_date) || empty($duration) || empty($phone_number)) {
            echo '<script>alert("Please fill in all the details.")</script>';
        } else {
            $total_price = $duration * $bike_price;
            $booking_query = "INSERT INTO booking (BIKE_ID, EMAIL, BOOK_DATE, DURATION, PHONE_NUMBER, PRICE) 
                              VALUES ($bike_id, '$user_email', '$booking_date', '$duration', '$phone_number', $total_price)";
            $booking_result = mysqli_query($con, $booking_query);

            if ($booking_result) {
                $_SESSION['email'] = $user_email;
                header("Location: payment.php");
            } else {
                echo '<script>alert("Please check the connection.")</script>';
            }
        }
    }
?>

<div class="navbar">
    <div class="icon">
        <h2 class="logo">BIKE RENTAL</h2>
    </div>
    <div class="menu">
        <ul>
            <li><a href="menu.php">HOME</a></li>
            <li><a href="aboutus2.html">ABOUT</a></li>
            <li><a href="contact2.html">CONTACT</a></li>
            <li><a href="feedback.html">FEEDBACK</a></li>
            <li><button class="nn"><a href="logout.php">LOGOUT</a></button></li>
            <li><p class="phello">HELLO! <span id="pname"><?= $user_name ?></span></p></li>
            <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
        </ul>
    </div>
</div>

<div class="main">
    <div class="register">
        <h2>BOOKING</h2>
        <form id="register" method="POST">
            <h3>Bike Name: <?= $bike_data['BIKE_NAME'] ?></h3>

            <label>BOOKING DATE: </label>
            <input type="date" name="date" id="datefield" required>

            <label>DURATION: </label>
            <input type="number" name="dur" min="1" max="30" id="name" placeholder="Enter Rent Period (in days)" required>

            <label>PHONE NUMBER: </label>
            <input type="tel" name="ph" maxlength="10" id="name" placeholder="Enter Your Phone Number" required>

            <input type="submit" class="btnn" value="BOOK" name="book">
        </form>
    </div>
</div>

<script>
    const today = new Date();
    const dd = today.getDate().toString().padStart(2, '0');
    const mm = (today.getMonth() + 1).toString().padStart(2, '0');
    const yyyy = today.getFullYear();
    const formattedDate = `${yyyy}-${mm}-${dd}`;

    document.getElementById("datefield").setAttribute("min", formattedDate);
</script>
</body>
</html>
