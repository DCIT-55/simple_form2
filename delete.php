<?php
// Include the database configuration file to establish a connection
include 'db_config.php';

// Check if the 'id' parameter is set in the GET request
if (isset($_GET['id'])) {
    // Retrieve the 'id' parameter from the GET request
    $id = $_GET['id'];

    // Prepare an SQL statement to delete a record from the 'users' table based on the provided ID
    $stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");

    // Bind the 'id' parameter to the prepared statement as an integer
    $stmt->bind_param("i", $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If the execution is successful, display a success message
        echo "Data deleted successfully!";
    } else {
        // If the execution fails, display an error message with details
        echo "Error deleting data: " . $stmt->error;
    }

    // Close the prepared statement to free up resources
    $stmt->close();

    // Close the database connection
    $mysqli->close();

    // Redirect the user back to the 'view_data.php' page
    header("Location: view_data.php");
    exit(); // Ensure no further code is executed after the redirect
} else {
    // If the 'id' parameter is not set, display an error message
    echo "Invalid request.";
}
?>