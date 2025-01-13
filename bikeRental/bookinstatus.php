<! –– Code author : Danneal Kendrick ––>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKE RENTAL</title>
   <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #ABE7FF;
        background-position: center;
        background-size: cover;
        display: flex;
        min-height: 100vh;
        align-items: center;
        justify-content: center;
    }

    .content {
        text-align: center;
        font-size: larger;
        background-color: #FFF;
        border-radius: 4px;
        padding: 10px;
        overflow: hidden;
    }

    .button {
        width: 240px;
        height: 40px;
        background: #FFB2D8;
        border: none;
        position: absolute;
        top: 10px; /* Adjust the distance from the top */
        left: 10px; /* Adjust the distance from the left */
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: #000;
        transition: 0.4s ease;
    }
.button:hover {
    background: #FFDDF6;
    color: black; /* Set the font color to the same as the background color */
}
    .button a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    ul {
        list-style: none;
        margin: 10px 0 0 10px;
    }

    ul li {
        display: inline-block;
        margin-right: 20px;
        font-size: 35px;
    }

    .name2 {
        font-weight: bold;
        background: #fff;
    }

    table {
        width: 90%;
        max-width: 100%;
        border-collapse: collapse;
        margin: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #FFB2D8;
        color: #000;
    }
</style>

</head>
<body>

<?php
require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation
session_start();
$email = $_SESSION['email'];

define('TD_CLOSE', '</td>'); // Define constant for closing table cell

$sql = "SELECT BIKE_NAME, DURATION, BOOK_STATUS, BOOK_DATE FROM booking b
        INNER JOIN bikes bk ON b.BIKE_ID = bk.BIKE_ID
        WHERE b.EMAIL='$email' ORDER BY b.BOOK_ID DESC";
$result = mysqli_query($con, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

if (mysqli_num_rows($result) == 0) {
    echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
    echo '<script>window.location.href = "menu.php";</script>';
} else {
    echo '<ul><li><button class="button"><a href="menu.php">Go to Home</a></button></li></ul>';
    echo '<div class="box"><div class="content"><table border="1">';
    
    // Display header row
    echo '<tr>
    <th style="text-align: center;">BIKE TYPE</th>
    <th style="text-align: center;">DURATION</th>
    <th style="text-align: center;">BOOK DATE</th>
    <th style="text-align: center;">BOOKING STATUS</th>
    </tr>';

    // Display data rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['BIKE_NAME'] . TD_CLOSE;
        echo '<td>' . $row['DURATION'] . ' hour' . TD_CLOSE;
        echo '<td>' . $row['BOOK_DATE'] . TD_CLOSE;
        echo '<td>' . $row['BOOK_STATUS'] . TD_CLOSE;
        echo '</tr>';
    }

    echo '</table></div></div>';
}

mysqli_close($con);
?>

</body>
</html>
