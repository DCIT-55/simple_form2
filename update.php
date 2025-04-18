<?php
// Include the database configuration file to establish a connection
include('db_config.php');

// Check if the required POST parameters ('id', 'name', 'email') are set
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
    // Retrieve the values from the POST request
    $id = $_POST['id'];       // The ID of the user to update
    $name = $_POST['name'];   // The updated name of the user
    $email = $_POST['email']; // The updated email of the user

    // Prepare an SQL statement to update the user's data in the database
    // Use parameterized queries to prevent SQL injection
    $stmt = $mysqli->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");

    // Bind the parameters to the prepared statement
    // 'ssi' indicates the types of the parameters: string, string, integer
    $stmt->bind_param("ssi", $name, $email, $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If the execution is successful, display a success message
        echo "Data updated successfully!";
    } else {
        // If the execution fails, display an error message with details
        echo "Error updating data: " . $stmt->error;
    }

    // Close the prepared statement to free up resources
    $stmt->close();

    // Close the database connection
    $mysqli->close();

    // Redirect the user back to the 'view_data.php' page
    header("Location: view_data.php");
    exit(); // Ensure no further code is executed after the redirect
} else {
    // If the required POST parameters are not set, display an error message
    echo "Invalid request.";
}
?>