<! –– Code author : Nurfairuz Binti Ahmad ––>

<?php

require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

$book_id=$_GET['id'];

$sql2="SELECT * from booking where BOOK_Id=$book_id";
$result2=mysqli_query($con,$sql2);
$res2 = mysqli_fetch_assoc($result2);
$bikeid = $res2['BIKE_ID'];

$sql="SELECT *from bikes where BIKE_ID=$bikeid";
$result=mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($result);

// Check if the booking status is not one of the statuses that should prevent approval
    if ($res2['BOOK_STATUS'] == 'APPROVED' || $res2['BOOK_STATUS'] == 'RETURNED' || $res2['BOOK_STATUS'] == 'IN USE' || $res2['BOOK_STATUS'] == 'REJECTED') {
    echo '<script>alert("ACTION CANNOT PROCEED, MAYBE ALREADY REJECTED")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';

    }else{
    
    $sql5="UPDATE booking set BOOK_STATUS='REJECTED' where BOOK_ID=$res2[BOOK_ID]";
    $query=mysqli_query($con,$sql5);
    
    echo '<script>alert("BIKE REJECTED SUCCESSFULLY")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
    }

?>
