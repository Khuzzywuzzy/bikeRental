<! –– Code author : Nurfairuz Binti Ahmad ––>

<?php

require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

define('REDIRECT_SCRIPT', '<script>window.location.href = "adminbook.php";</script>'); // Define constant for repeated string

$book_id = $_GET['id'];

$sql2 = "SELECT * FROM booking WHERE BOOK_Id = $book_id";
$result2 = mysqli_query($con, $sql2);
$res2 = mysqli_fetch_assoc($result2);
$bikeid = $res2['BIKE_ID'];

$sql = "SELECT * FROM bikes WHERE BIKE_ID = $bikeid";
$result = mysqli_query($con, $sql);
$res = mysqli_fetch_assoc($result);

// Check if the booking status is not one of the statuses that should prevent approval
if ($res2['BOOK_STATUS'] == 'RETURNED' || $res2['BOOK_STATUS'] == 'IN USE' || $res2['BOOK_STATUS'] == 'REJECTED') {
    echo '<script>alert("ACTION CANNOT PROCEED, MAYBE ALREADY IN USE")</script>';
    echo REDIRECT_SCRIPT;

} else {
    
    // Check if receipt exists in the payment table
    $paymentQuery = "SELECT * FROM payment WHERE book_id = $book_id";
    $paymentResult = mysqli_query($con, $paymentQuery);
    $paymentExists = mysqli_num_rows($paymentResult) > 0;

    if (!$paymentExists) {
        echo '<script>alert("Receipt not uploaded. Cannot change status.")</script>';
        echo REDIRECT_SCRIPT;
    
    } else {
        $sql5 = "UPDATE booking SET BOOK_STATUS='IN USE' WHERE BOOK_ID=$res2[BOOK_ID]";
        $query = mysqli_query($con, $sql5);

        echo '<script>alert("BIKE UPDATED TO IN USE SUCCESSFULLY")</script>';
        echo REDIRECT_SCRIPT;
    }
}

?>
