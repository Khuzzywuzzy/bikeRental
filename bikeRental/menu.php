<! –– Code author : Nurfairuz Binti Ahmad ––>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKE RENTAL</title>
    
</head>

<body class="body">

<style>
*{
    margin: 0;
    padding: 0;

}

body{
    background-color: #ABE7FF;
    background-position: center;
    background-size: cover;

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
    padding-top: 35px;

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

.box{
    position:center;
    top: 50%;
    left: 50%;
    padding: 20px;
    transform: translate(20%, -30%);
    box-sizing: border-box;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
    background: linear-gradient(to top, rgba(255, 251, 251, 0.8)50%,rgba(250, 246, 246, 0.8)50%);
    display: flex;
    align-content: center;
    width: 600px;
    height: 200px;
    margin-top: 100px;
    margin-left: 220px;
}

.box .imgBx{
    width: 85px;
    flex:0 0 85px;
}

.box .imgBx img{
    max-width: 150%;
}

.box .content{
    padding-left: 100px;
}

.box .button{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.utton{
    width: 240px;
    height: 40px;
   
    background: #FFB2D8;
    border:none;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.de{
    float: left;
    clear: left;
    display: block;
}

.de li a:hover{
    color:white;

}

.de .lis:hover{
    color: white;
}

.nn{
    width:100px;
    background: #FFB2D8;
    border:none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:white;
    transition: 0.4s ease;
}

.nn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
    
}

.overview{
    text-align: center;
    font-size: 55px;
    color: #DC37B7;
    margin-top: 40px;
}

.circle{
    border-radius:48%;
    width:65px;
}

.phello {
    width: 200px;
    margin-left: 60px;
    padding: 0;
    color: black;
    font-size: 16px;
    display: flex;
    align-items: center; /* Align items vertically in the center */
}

#name {
    text-decoration: none; /* Remove underline from the link */
    color: #000; /* Set link color to a specific color, you can change it */
    font-weight: bold; /* Make the link text bold */
    margin-left: 30px; /* Adjust the margin for spacing between "HELLO!" and the name */
}

#name:hover {
    color: #fff; /* Change link color on hover, you can customize this color */
}

#stat{
    margin-left: -8px;
}

</style>

<?php
    require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation
        session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $sql2="select *from bikes where AVAILABILITY!='0'";
    $bikes= mysqli_query($con,$sql2);
    
    ?>

<div class="cd">
    <div class="main">
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
                    <li><p class="phello">HELLO!&nbsp;<a id="name" href="profile.php"><?php echo $rows['NAME']?></a></p></li>
                    <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
                </ul>
                
            </div>
        </div>
    <div> <h1 class="overview">BICYCLE TYPES</h1>

    <ul class="de">
<?php
        while($result= mysqli_fetch_array($bikes))
        {
?>
    
    <li>
    <form method="POST">
    <div class="box">
        <div class="imgBx">
            <img src="images/<?php echo $result['BIKE_IMG']?>">
        </div>
        <div class="content">
            <?php $res=$result['BIKE_ID'];?>
            <h1><?php echo $result['BIKE_NAME']?></h1>
            <h2>Availability : <a><?php echo $result['AVAILABILITY']?></a> </h2>
            <h2>Rent Per Hour : <a>RM <?php echo $result['PRICE']?> /-</a></h2>
            <button type="submit"  name="booknow" class="utton" style="margin-top: 5px;"><a href="booking.php?id=<?php echo $res;?>">BOOK</a></button>
        </div>
    </div>
    </form>
    </li>
<?php
        }
?>

<?php
    require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

    $value = $_SESSION['email'];
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
?>
           
    </ul>
    
    </div>
    </div>
</div>
  
</body>
</html>
