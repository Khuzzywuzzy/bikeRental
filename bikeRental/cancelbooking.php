<! –– Code author : Muhammad Aqqil Haziq ––>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKE RENTAL</title>
</head>
<body>
<style>
    .form{
        align-content: center;
        margin-left: 250px;
        margin-top: 250px;
    }
    body{
    background-color: #ABE7FF;
    background-position: center;
    background-size: cover;

}
    .hai{
        width: 200px;
    height: 40px;
   
    background: #FFB2D8;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:black;
    margin-left: 170px;
    transition: 0.4s ease;
    }
    
    .hai:hover {
    background: #FFDDF6;
    color: black; /* Set the font color to the same as the background color */
}
    
    .no{
        width: 200px;
    height: 40px;
   
    background: #FFB2D8;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:black;
    margin-left: 100px;
    transition: 0.4s ease;
    }

.no:hover {
    background: #FFDDF6;
    color: black; /* Set the font color to the same as the background color */
}

    .no a{
        text-decoration: none;
        color: black;
    }

</style>
<?php
    
    require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation
    session_start();
    $bid = $_SESSION['bid'];
    if(isset($_POST['cancelnow'])){
        $del = mysqli_query($con,"delete from booking where BOOK_ID = '$bid' order by BOOK_ID DESC limit 1");
        echo "<script>window.location.href='menu.php';</script>";
        
    }


?>
 <form class="form"  method="POST" >
        <h1>ARE YOU SURE YOU WANT TO CANCEL YOUR BOOKING?</h1>
         <input type="submit" class="hai" value="CANCEL NOW" name="cancelnow">
        <button class="no"><a href="payment.php" >GO TO PAYMENT</a></button>
    </form>
</body>
</html>
