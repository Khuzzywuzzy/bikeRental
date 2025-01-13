<! –– Code author : Muhammad Asnawie ––>

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
* {
    margin: 0;
    padding: 0;
}



.hai {
    width: 100%;
    background: #ABE7FF;
    background-position: center;
    background-size: cover;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
}

.navbar {
    width: 1200px;
    height: 75px;
    margin: auto;
}

.icon {
    width: 200px;
    float: left;
    height: 70px;
}

.logo {
    color: #0E79C8;
    font-size: 26px;
    font-family: 'Tahoma';
    padding-left: 20px;
    float:left;
    padding-top: 45px;
}

.menu {
    width: 400px;
    float: left;
    height: 70px;
}

ul {
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li {
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;
}

ul li a {
    text-decoration: none;
    color: black;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}

ul li a:hover{
    color:white;

}

.content-table {
    border-collapse: collapse;
    font-size: 0.9em;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,0,0,0.15);
    margin-left: 350px;
    margin-top: 25px;
    width: 800px;
    height: 500px;
    background-color: white; /* Set a background color for the table */
}

.content-table thead tr {
    background-color: #0E79C8;
    color: white;
    text-align: left;
}

.content-table th,
.content-table td {
    padding: 12px 15px;
    text-align: center;
}

.content-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
    border-bottom: black;
}

.content-table thead .active-row {
    font-weight: bold;
    color: black;
}

/* Add the following rule to prevent background color outside the tbody */
.content-table tbody {
    background-color: white;
}

.content-table tbody tr.matched-row {
    background-color: #e6f7ff; /* Background color for matching rows */
    font-weight: bold;
    color: #0056b3; /* Text color for matching rows */
}

.header {
    margin-top: 20px;
    margin-left: 650px;
    color: #DC37B7; /* You can replace 'blue' with your desired color */
}


.nn {
   width:100px;
    background: #FFB2D8;
    border:none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:black;
    transition: 0.4s ease;
}



.nn a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}
</style>

<?php

require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation
session_start();


$query="select *from feedback ORDER BY FED_ID DESC";
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


?>





    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">BIKE RENTAL</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="adminmenu.php">MENU</a></li>
                    <li><a href="adminbike.php">BIKES</a></li>
                    <li><a href="adminusers.php">USERS</a></li>
                    <li><a href="adminfeedback.php">FEEDBACKS</a></li>
                    
                    <li><a href="adminbook.php">BOOKING REQUEST</a></li>
                  <li> <button class="nn"><a href="adminlogout.php">LOGOUT</a></button></li>
                </ul>
            </div>
            
          
        </div>
        <div>
            <h1 class="header">FEEDBACKS</h1>	<br><br>
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>EMAIL</th>
                        <th>COMMENT</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
$counter = 1; // Initialize a counter variable
while($res=mysqli_fetch_array($queryy)){
?>
                <tr  class="active-row">
                    <td><?php echo $counter;?></td>
                    <td><?php echo $res['EMAIL'];?></php></td>
                    <td><?php echo $res['COMMENT'];?></php></td>
                </tr>
                <?php
    $counter++; // Increment the counter for the next row
} ?>
             
                </tbody>
                </table>
                </div>
            </div>
        </div>
     
</body>
</html>
