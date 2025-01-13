<?php

require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatebike'])) {
    $bikeid = isset($_POST['bikeid']) ? intval($_POST['bikeid']) : 0;

    if ($bikeid <= 0) {
        echo "Invalid bike ID";
        exit();
    }

    // Sanitize input
    $bikename = sanitize_input($_POST['bikename']);
    $avail = intval($_POST['avail']);
    $price = intval($_POST['price']);

    // Handle file upload
    if ($_FILES['fileToUpload']['size'] > 0) {
        update_bike_with_image($con, $bikeid, $bikename, $avail, $price);
    } else {
        update_bike_without_image($con, $bikeid, $bikename, $avail, $price);
    }
} else {
    invalid_request_redirect();
}

/**
 * Sanitize input to prevent SQL injection
 */
function sanitize_input($input) {
    global $con;
    return mysqli_real_escape_string($con, $input);
}

/**
 * Update bike details including image
 */
function update_bike_with_image($con, $bikeid, $bikename, $avail, $price) {
    $oldPhotoFilename = fetch_old_photo_filename($con, $bikeid);

    // Delete old photo if exists
    if ($oldPhotoFilename) {
        delete_old_photo($oldPhotoFilename);
    }

    // Move new uploaded image
    $newImageFilename = move_uploaded_image();

    // Update database
    $sql = "UPDATE bikes SET BIKE_NAME='$bikename', AVAILABILITY=$avail, PRICE=$price, BIKE_IMG='$newImageFilename' WHERE BIKE_ID=$bikeid";
    execute_query($con, $sql);
}

/**
 * Update bike details without changing image
 */
function update_bike_without_image($con, $bikeid, $bikename, $avail, $price) {
    $sql = "UPDATE bikes SET BIKE_NAME='$bikename', AVAILABILITY=$avail, PRICE=$price WHERE BIKE_ID=$bikeid";
    execute_query($con, $sql);
}

/**
 * Fetch the current image filename of the bike
 */
function fetch_old_photo_filename($con, $bikeid) {
    $sqlOldPhoto = "SELECT BIKE_IMG FROM bikes WHERE BIKE_ID = $bikeid";
    $resultOldPhoto = mysqli_query($con, $sqlOldPhoto);

    if (mysqli_num_rows($resultOldPhoto) > 0) {
        $rowOldPhoto = mysqli_fetch_assoc($resultOldPhoto);
        return $rowOldPhoto['BIKE_IMG'];
    }

    return null;
}

/**
 * Delete the old image file from the server
 */
function delete_old_photo($oldPhotoFilename) {
    if (file_exists("images/$oldPhotoFilename")) {
        unlink("images/$oldPhotoFilename");
    }
}

/**
 * Move the uploaded image to the target directory
 */
function move_uploaded_image() {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    return basename($_FILES["fileToUpload"]["name"]);
}

/**
 * Execute the SQL query and handle the response
 */
function execute_query($con, $sql) {
    if (mysqli_query($con, $sql)) {
        echo '<script>alert("BIKE UPDATED SUCCESSFULLY")</script>';
        echo '<script>window.location.href = "adminbike.php";</script>';
        exit();
    } else {
        echo '<script>alert("Error updating record: ' . mysqli_error($con) . '")</script>';
        echo '<script>window.location.href = "adminbikeupdate.php?id=' . $bikeid . '";</script>';
    }
}

/**
 * Redirect on invalid request
 */
function invalid_request_redirect() {
    echo '<script>alert("Invalid request")</script>';
    echo '<script>window.location.href = "adminbike.php";</script>';
}

?>
