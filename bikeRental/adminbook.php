<! –– Code author : Nurfairuz Binti Ahmad ––>

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

body {
    background: #ABE7FF;
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

.content-table {
    border-collapse: collapse;
    font-size: 1em;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin-left: 50px;
    margin-top: 25px;
    width: 1400px;
    display: block; /* Add display: block to prevent background color overflow */
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
}

.content-table tbody tr {
    border-bottom: #000;
}

.content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
    border-bottom: black;
}

.content-table thead .active-row {
    font-weight: bold;
    color: #0E79C8;
}

.header{
    margin-top: -700px;
    margin-left: 650px;
    color: #DC37B7;
    padding-left: 20px;
}

.nn{
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
    color: black;
}

.nn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.buta{
    background: #ACFDA5;
    transition: 0.4s ease;
}

.buta:hover {
    background: #E7FFE6;
    color: black;
}

.buta a{
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
    display: inline-block;
    line-height: 40px;
    text-align: center;
}

.buti{
    background: #FFB2D8;
    transition: 0.4s ease;
}

.buti:hover {
    background: #FFE6F6;
    color: black;
}

.buti a{
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
    display: inline-block;
    line-height: 40px;
    text-align: center;
}

.butrj{
    background: #FAA6A6;
    transition: 0.4s ease;
}

.butrj:hover {
    background: #FFDBDB;
    color: black;
}

.butrj a{
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
    display: inline-block;
    line-height: 40px;
    text-align: center;
}

.butr{
    background: #FDF1A5;
    transition: 0.4s ease;
}

.butr:hover {
    background: #FFFBE4;
    color: black;
}

.butr a{
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
    display: inline-block;
    line-height: 40px;
    text-align: center;
}
</style>

<?php

require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

$query = "SELECT b.*, p.RESIT_IMG
          FROM booking b
          LEFT JOIN payment p ON b.BOOK_ID = p.BOOK_ID
          ORDER BY b.BOOK_ID DESC";
          
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
</div>
        <div>
            <br><br><h1 class="header">BOOKINGS</h1><br>
            <div>
            <br>
                <div>
                    <table class="content-table">
                    <thead>
                    <tr>
                        <th  style="text-align: center;">NO</th>
                        <th  style="text-align: center;">EMAIL</th>
                        <th  style="text-align: center;">PHONE NUMBER</th>
                        <th  style="text-align: center;">BOOK DATE</th>
                        <th  style="text-align: center;">DURATION</th>
                        <th  style="text-align: center;">PRICE</th>
                        <th  style="text-align: center;">RECEIPT</th>
                        <th  style="text-align: center;">BOOKING STATUS</th>
                        <th  style="text-align: center;">APPROVE</th>
                        <th  style="text-align: center;">REJECTED</th>
                        <th  style="text-align: center;">IN USE</th>
                        <th  style="text-align: center;">RETURNED</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                
                
                <div style="text-align: center; font-size: 20px;  padding-left: 10px;">

                <form method="GET" action="">
                <label for="search">Search:</label>
                
                <select name="search" id="search">
                    <option value="" style="text-align: center;">-- Select Status --</option>
                    <option value="UNDER PROCESSING">UNDER PROCESSING</option>
                    <option value="APPROVE">APPROVED</option>
                    <option value="REJECTED">REJECTED</option>
                    <option value="IN USE">IN USE</option>
                    <option value="RETURNED">RETURNED</option>
                </select>
    
                <button type="submit" class="nn2">Search</button>
                <button type="submit" class="nn2"><a href="adminbook.php">Reset</a></button>
                
                </form>
                </div>
                
<?php
                
$bkcounter = 1;
while ($res = mysqli_fetch_array($queryy)) {
               
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
    if (empty($searchQuery) || stripos($res['BOOK_STATUS'], $searchQuery) !== false) {
                
?>
                    <tr  class="active-row">
                    
                        <td  style="text-align: center;"><?php echo $bkcounter; ?></td>
                        <td  style="text-align: center;"><?php echo $res['EMAIL'];?></td>
                        <td  style="text-align: center;"><?php echo $res['PHONE_NUMBER'];?></td>
                        <td  style="text-align: center;"><?php echo $res['BOOK_DATE'];?></td>
                        <td  style="text-align: center;"><?php echo $res['DURATION'];?> hour</td>
                        <td  style="text-align: center;">RM <?php echo $res['PRICE'];?></td>
                        <td  style="text-align: center;"><?php echo '<a href="receipts/' . $res["RESIT_IMG"] . '" target="_blank">' . $res["RESIT_IMG"] . '</a>'; ?></td>
                        <td  style="text-align: center;"><?php echo $res['BOOK_STATUS'];?></td>
                        <td  style="text-align: center;"><button type="submit"  class="buta"  name="approve"><a href="adminapprove.php?id=<?php echo $res['BOOK_ID']?>">APPROVE</a></button></td>
                        <td  style="text-align: center;"><button type="submit"  class="butrj"  name="approve"><a href="adminrejected.php?id=<?php echo $res['BOOK_ID']?>">REJECTED</a></button></td>
                        <td  style="text-align: center;"><button type="submit"  class="buti"  name="approve"><a href="adminin_use.php?id=<?php echo $res['BOOK_ID']?>">IN USE</a></button></td>
                        <td  style="text-align: center;"><button type="submit" class="butr" name="approve"><a href="adminreturn.php?id=<?php echo $res['BIKE_ID']?>&bookid=<?php echo $res['BOOK_ID']?>">RETURNED</a></button></td>
                    </tr>
<?php

$bkcounter++;
    }
}

?>
                    
                    </tbody>
                    </table>
                
                </div>
            </div>
        </div>
</body>
</html>
