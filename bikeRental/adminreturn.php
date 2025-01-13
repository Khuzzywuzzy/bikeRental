<! –– Code author : Nurfairuz Binti Ahmad ––>

<?php

require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

define('REDIRECT_SCRIPT', '<script>window.location.href = "adminbook.php";</script>'); // Define constant for repeated string

$bikeid = $_GET['id'];
$book_id = $_GET['bookid'];

$sql2 = "SELECT * FROM booking WHERE BOOK_Id = $book_id";
$result2 = mysqli_query($con, $sql2);
$res2 = mysqli_fetch_assoc($result2);

$sql = "SELECT * FROM bikes WHERE BIKE_ID = $bikeid";
$result = mysqli_query($con, $sql);
$res = mysqli_fetch_assoc($result);

// Check if the booking status is not one of the statuses that should prevent approval
if ($res2['BOOK_STATUS'] == 'RETURNED' || $res2['BOOK_STATUS'] == 'REJECTED') {
    echo '<script>alert("ACTION CANNOT PROCEED, MAYBE ALREADY RETURNED")</script>';
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
        $newAvailability = $res['AVAILABILITY'] + 1;
        $updateBikeQuery = "UPDATE bikes SET AVAILABILITY = $newAvailability WHERE BIKE_ID = $bikeid";
        $updateBikeResult = mysqli_query($con, $updateBikeQuery);

        $sql5 = "UPDATE booking SET BOOK_STATUS = 'RETURNED' WHERE BOOK_ID = $res2[BOOK_ID]";
        $query = mysqli_query($con, $sql5);

        echo '<script>alert("BIKE RETURNED SUCCESSFULLY")</script>';
        echo REDIRECT_SCRIPT;
    }
}

?>
