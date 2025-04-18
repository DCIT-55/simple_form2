<?php
include ('db_config.php');

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Prepare and bind
    $stmt = $mysqli->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $email, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . $stmt->error;
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
