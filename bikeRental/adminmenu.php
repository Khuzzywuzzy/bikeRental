<! –– Code author : Danneal Kendrick ––>

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
*{
    margin: 0;
    padding: 0;

}
.hai{
    width: 100%;
    background:#ABE7FF;
    background-position: center;
    background-size: cover;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
}
.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%);
    background-position: center;
    background-size: cover;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
}
.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}

.icon{
    width:200px;
    float: left;
    height : 70px;
}

.logo{
    color: #0E79C8;
    font-size: 26px;
    font-family: 'Tahoma';
    padding-left: 20px;
    float:left;
    padding-top: 45px;

}
.menu{
    width: 400px;
    float: left;
    height: 70px;

}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li{
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;

}

ul li a{
    text-decoration: none;
    color: black;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;

}

ul li a:hover{
    color:white;

}

.content-table{
   border-collapse: collapse;
    
    font-size: 0.9em;
  
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow:0 0  20px rgba(0,0,0,0.15);
    margin-left : 350px ;
    margin-top: 25px;
    width: 800px;
    height: 500px;
}
.content-table thead tr{
    background-color: orange;
    color: white;
    text-align: left;
}

.content-table th,
.content-table td{
    padding: 12px 15px;


}

.content-table tbody tr{
    border-bottom: 1px solid #FFB2D8;
}
.content-table tbody tr:nth-of-type(even){
    background-color: #FFB2D8;

}
.content-table tbody tr:last-of-type{
    border-bottom: 2px solid orange;
}

.content-table thead .active-row{
    font-weight:  bold;
    color: orange;
}


.header{
    margin-top: 70px;
    margin-left: 650px;
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


.boxes {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-top: 50px;
}

.box {
    width: 100%;
    height: 200px;
    background-color: #FF8EC6; /* You can set the background color as per your design */
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: 0.4s ease;
    color: white;
    font-weight: bold;
}

.box:hover {
    background: #FFE6F6;
    color: black; /* Set the font color to the same as the background color */
}

.box a {
    text-decoration: none;
    color: black;
    font-weight: bold;
    font-size: 18px;

}
</style>

<?php

require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation
session_start();


$query="select *from feedback";
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
                <li><button class="nn"><a href="adminlogout.php">LOGOUT</a></button></li>
            </ul>
        </div>
    </div>

    <!-- New section for boxes -->
     <div class="boxes">
    <a href="adminbike.php" class="box" style="text-decoration: none; font-size: 40px;">
        <span>BIKES</span>
    </a>
    <a href="adminusers.php" class="box" style="text-decoration: none; font-size: 40px;">
        <span>USERS</span>
    </a>
    <a href="adminfeedback.php" class="box" style="text-decoration: none; font-size: 40px;">
        <span>FEEDBACKS</span>
    </a>
    <a href="adminbook.php" class="box" style="text-decoration: none; font-size: 40px;">
        <span>BOOKING REQUEST</span>
    </a>
</div>
</div>

</body>
</html>
