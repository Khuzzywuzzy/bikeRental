<?php
// Include the file that fetches the user data
require_once 'get_user_data_profile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKE RENTAL - Edit Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <button class="home-btn"><a href="profile.php">Back</a></button>

    <form method="post" action="update_profile.php">
        <h2>Edit Profile</h2>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $rows['NAME']; ?>" required>

        <label for="stud_num">Student Number:</label>
        <input type="text" id="stud_num" name="stud_num" value="<?php echo $rows['STUD_NUM']; ?>" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="<?php echo $rows['PHONE_NUMBER']; ?>" required>

        <!-- Non-editable email input -->
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $rows['EMAIL']; ?>" readonly>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male" <?php echo ($rows['GENDER'] === 'male') ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo ($rows['GENDER'] === 'female') ? 'selected' : ''; ?>>Female</option>
        </select>

        <button type="submit" class="save-btn">Save Changes</button>
    </form>
</body>
</html>
