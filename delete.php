<?php
include 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and bind
    $stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data deleted successfully!";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    $mysqli->close();

    header("Location: view_data.php");
    exit();
} else {
    echo "Invalid request.";
}
?>