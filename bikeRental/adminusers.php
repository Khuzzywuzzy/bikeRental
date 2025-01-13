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
* {
    margin: 0;
    padding: 0;
}

.background-container {
    width: 100%;
    background: #ABE7FF;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
}

.main {
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%);
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
    min-width: 400px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,0,0,0.15);
    margin-left: 350px;
    margin-top: 25px;
    width: 800px;
    height: 500px;
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

.nn2{
    width:100px;
    background: #FFB2D8;
    border:none;
    height: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:black;
    transition: 0.4s ease;
    text-decoration: none;
    font-weight: bold;

}


.nn2:hover {
    background: white;
    color: black; /* Set the font color to the same as the background color */
}


.nn a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.but{
    background: #FFB2D8;
    transition: 0.4s ease;
}

.but:hover {
    background: #FFE6F6;
    color: black; /* Set the font color to the same as the background color */
}

.but a {
    width: 90px;
    border: none;
    height: auto;
    font-size: 13px;
    border-radius: 0px;
    cursor: pointer;
    color: black;
    transition: 0.4s ease;
    text-decoration: none;
    font-weight: bold;
    display: inline-block; /* Ensures the anchor behaves like a block-level element */
    line-height: 40px; /* Centers the text vertically within the button */
    text-align: center; /* Centers the text horizontally within the button */
}
</style>

<?php
require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation
$query = "select * from users";
$queryy = mysqli_query($con, $query);
$num = mysqli_num_rows($queryy);
?>

<div class="background-container">
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
        <div>
            <h1 class="header" style="padding-left: 50px;">USERS</h1><br><br>
            <div>
                <div style="text-align: center; font-size: 20px;">
                    <form method="GET" action="">
                        <label for="search">Search:</label>
                        <input type="text" name="search" id="search" style="font-size: 18px; padding-left: 10px;">
                        <button type="submit" class="nn2">Search</button>
                        <button type="submit" class="nn2"><a href="adminusers.php">Reset</a></button>
                    </form>
                </div>
                <br>

                <div>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>MATRIC NO</th>
                                <th>PHONE NUMBER</th>
                                <th>GENDER</th>
                                <th>DELETE USERS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ucounter = 1;
                            while ($res = mysqli_fetch_array($queryy)) {
                                $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
                                if (
                                    empty($searchQuery) ||
                                    stripos($res['NAME'], $searchQuery) !== false ||
                                    stripos($res['STUD_NUM'], $searchQuery) !== false ||
                                    stripos($res['EMAIL'], $searchQuery) !== false ||
                                    stripos($res['PHONE_NUMBER'], $searchQuery) !== false
                                ) {
                            ?>
                                    <tr class="active-row">
                                        <td><?php echo $ucounter; ?></td>
                                        <td style="text-align: left;"><?php echo $res['NAME']; ?></td>
                                        <td><?php echo $res['EMAIL']; ?></td>
                                        <td><?php echo $res['STUD_NUM']; ?></td>
                                        <td><?php echo $res['PHONE_NUMBER']; ?></td>
                                        <td><?php echo $res['GENDER']; ?></td>
                                        <td><button type="submit" class="but" name="approve"><a href="deleteuser.php?id=<?php echo $res['EMAIL'] ?>">DELETE</a></button></td>
                                    </tr>
                            <?php
                                    $ucounter++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                        
                </div>
            </div>
        
        </div>
    </div>
</div>
</body>
</html>
