<! –– Code author : Nurfairuz Binti Ahmad ––>

<?php

require_once 'connection.php'; // Removed parentheses as per SonarQube recommendation

/**
 * Retrieves the image filename for a specific bike.
 *
 * @param mysqli $con Database connection.
 * @param int $bikeid ID of the bike.
 * @return string|null Image filename or null if not found.
 */
function getBikeImage($con, $bikeid) {
    $stmt = $con->prepare("SELECT BIKE_IMG FROM bikes WHERE BIKE_ID = ?");
    $stmt->bind_param("i", $bikeid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['BIKE_IMG'] ?? null;
}

/**
 * Deletes a file from the specified path.
 *
 * @param string $filepath Path to the file.
 * @return bool True if the file was successfully deleted, false otherwise.
 */
function deleteFile($filepath) {
    return file_exists($filepath) && unlink($filepath);
}

/**
 * Deletes a bike record from the database.
 *
 * @param mysqli $con Database connection.
 * @param int $bikeid ID of the bike to delete.
 * @return bool True if the record was successfully deleted, false otherwise.
 */
function deleteBikeRecord($con, $bikeid) {
    $stmt = $con->prepare("DELETE FROM bikes WHERE BIKE_ID = ?");
    $stmt->bind_param("i", $bikeid);
    return $stmt->execute();
}

// Main process
$bikeid = $_GET['id'];

$image_filename = getBikeImage($con, $bikeid);

if ($image_filename) {
    $image_path = 'images/' . $image_filename;
    deleteFile($image_path);
}

if (deleteBikeRecord($con, $bikeid)) {
    echo '<script>alert("BIKE DELETED SUCCESSFULLY");</script>';
} else {
    echo '<script>alert("Failed to delete bike record");</script>';
}

echo '<script>window.location.href = "adminbike.php";</script>';

?>
