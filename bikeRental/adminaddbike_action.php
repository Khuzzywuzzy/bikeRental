<!–– Code author : Nurfairuz Binti Ahmad ––>

<?php

if (isset($_POST['addbike'])) {

    require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        // Allowed image extensions
        $allowed_exs = array("jpg", "jpeg", "png", "webp", "svg");

        if (in_array($img_ex_lc, $allowed_exs)) {
            // Generate a unique image name to prevent conflicts
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'images/' . $new_img_name;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($tmp_name, $img_upload_path)) {
                
                // Sanitize input values
                $bikename = mysqli_real_escape_string($con, $_POST['bikename']);
                $avail = mysqli_real_escape_string($con, $_POST['avail']);
                $price = mysqli_real_escape_string($con, $_POST['price']);

                // Prepare the SQL query to insert the bike into the database
                $query = "INSERT INTO bikes (BIKE_NAME, AVAILABILITY, PRICE, BIKE_IMG)
                          VALUES ('$bikename', $avail, $price, '$new_img_name')";

                // Execute the query and handle the result
                if (mysqli_query($con, $query)) {
                    echo '<script>alert("New Bike Added Successfully!!")</script>';
                    echo '<script>window.location.href = "adminbike.php";</script>';
                } else {
                    echo '<script>alert("Database error. Please try again.")</script>';
                    echo '<script>window.location.href = "adminaddbike.php";</script>';
                }
            } else {
                // Handle file upload failure
                echo '<script>alert("Failed to upload image. Please try again.")</script>';
                echo '<script>window.location.href = "adminaddbike.php";</script>';
            }
        } else {
            // Invalid image type
            echo '<script>alert("Cannot upload this type of image.")</script>';
            echo '<script>window.location.href = "adminaddbike.php";</script>';
        }
    } else {
        // File upload error
        echo '<script>alert("Unknown error occurred while uploading the image.")</script>';
        echo '<script>window.location.href = "adminaddbike.php";</script>';
    }

} else {
    echo "Error: No data submitted.";
}

?>
