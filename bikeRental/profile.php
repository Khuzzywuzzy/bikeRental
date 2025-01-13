<?php
// Include the file that fetches the user data
require_once 'get_user_data_profile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKE RENTAL - User Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <h2>User Profile</h2>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><?php echo $rows['NAME']; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $rows['EMAIL']; ?></td>
                </tr>
                <tr>
                    <td>Student Number:</td>
                    <td><?php echo $rows['STUD_NUM']; ?></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><?php echo $rows['PHONE_NUMBER']; ?></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><?php echo ucfirst($rows['GENDER']); ?></td>
                </tr>
            </table>
        </div>
        <button class="edit-profile-btn"><a href="edit_profile.php">Edit Profile</a></button>
        <button class="home-btn"><a href="menu.php">Home</a></button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const successMessage = urlParams.get('success');
            const errorMessage = urlParams.get('error');

            if (successMessage) {
                alert('Profile updated successfully!');
            } else if (errorMessage) {
                alert('Error updating profile: ' + decodeURIComponent(errorMessage));
            }
        });
    </script>
</body>
</html>
