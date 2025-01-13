<! –– Code author : Muhammad Asnawie ––>

<?php

// Database configuration
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "bikerental");

/**
 * Establishes a database connection.
 *
 * @return mysqli The database connection object.
 */
function getDatabaseConnection() {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

/**
 * Validates the form input.
 *
 * @param string $name
 * @param string $email
 * @param string $message
 * @return bool True if all inputs are valid, otherwise false.
 */
function validateInput($name, $email, $message) {
    return !empty($name) && !empty($email) && !empty($message);
}

/**
 * Submits feedback to the database.
 *
 * @param mysqli $conn
 * @param string $name
 * @param string $email
 * @param string $message
 * @return bool True on successful submission, false otherwise.
 */
function submitFeedback($conn, $name, $email, $message) {
    $stmt = $conn->prepare("INSERT INTO feedback (FED_ID, email, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        return true;
    } else {
        error_log("Database Error: " . $stmt->error);
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $message = $_POST["message"] ?? '';

    if (validateInput($name, $email, $message)) {
        $conn = getDatabaseConnection();
        if (submitFeedback($conn, $name, $email, $message)) {
            header("Location: feedsub.html");
            exit();
        } else {
            echo "Error submitting feedback. Please try again.";
        }
        $conn->close();
    } else {
        echo "All fields are required. Please fill out the form completely.";
    }
}

?>
