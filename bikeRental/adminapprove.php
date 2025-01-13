<!–– Code author : Nurfairuz Binti Ahmad ––>

<?php

require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

define('REDIRECT_SCRIPT', '<script>window.location.href = "adminbook.php";</script>'); // Define constant for repeated string

$bookid = $_GET['id'];

// Function to fetch booking details
function getBookingDetails($con, $bookid) {
    $sql = "SELECT * FROM booking WHERE BOOK_Id = $bookid";
    return mysqli_query($con, $sql);
}

// Function to fetch bike details
function getBikeDetails($con, $bike_id) {
    $sql2 = "SELECT * FROM bikes WHERE BIKE_ID = $bike_id";
    return mysqli_query($con, $sql2);
}

// Function to check if payment exists
function isPaymentReceived($con, $bookid) {
    $paymentQuery = "SELECT * FROM payment WHERE book_id = $bookid";
    $paymentResult = mysqli_query($con, $paymentQuery);
    return mysqli_num_rows($paymentResult) > 0;
}

// Function to update booking status
function updateBookingStatus($con, $bookid, $status) {
    $query = "UPDATE booking SET BOOK_STATUS='$status' WHERE BOOK_ID=$bookid";
    return mysqli_query($con, $query);
}

// Function to update bike availability
function updateBikeAvailability($con, $bike_id, $availability) {
    $updateBikeQuery = "UPDATE bikes SET AVAILABILITY=$availability WHERE BIKE_ID=$bike_id";
    return mysqli_query($con, $updateBikeQuery);
}

// Main logic starts here
$bookingResult = getBookingDetails($con, $bookid);
$booking = mysqli_fetch_assoc($bookingResult);
$bike_id = $booking['BIKE_ID'];
$bikeResult = getBikeDetails($con, $bike_id);
$bike = mysqli_fetch_assoc($bikeResult);

$email = $booking['EMAIL'];
$bikename = $bike['BIKE_NAME'];

// Check if bike is available
if ($bike['AVAILABILITY'] > 1) {
    
    // Check if booking status allows for approval
    if (in_array($booking['BOOK_STATUS'], ['APPROVED', 'RETURNED', 'IN USE', 'REJECTED'])) {
        echo '<script>alert("ACTION CANNOT PROCEED, MAYBE ALREADY APPROVED")</script>';
        echo REDIRECT_SCRIPT;
    
    } else {
        // Check if payment receipt exists
        if (!isPaymentReceived($con, $bookid)) {
            echo '<script>alert("Receipt not uploaded. Cannot change status.")</script>';
            echo REDIRECT_SCRIPT;
        
        } else {
            // Update booking status to 'APPROVED'
            if (updateBookingStatus($con, $bookid, 'APPROVED')) {
                // Update bike availability
                $newAvailability = $bike['AVAILABILITY'] - 1;
                if (updateBikeAvailability($con, $bike_id, $newAvailability)) {
                    echo '<script>alert("APPROVED SUCCESSFULLY")</script>';
                    echo REDIRECT_SCRIPT;
                } else {
                    echo '<script>alert("Failed to update bike availability")</script>';
                    echo REDIRECT_SCRIPT;
                }
            } else {
                echo '<script>alert("Failed to update booking status")</script>';
                echo REDIRECT_SCRIPT;
            }
        }
    }
    
} else {
    echo '<script>alert("BIKE IS NOT AVAILABLE")</script>';
    echo REDIRECT_SCRIPT;
}

?>
