<?php
// Include the database configuration file to establish a connection
include 'db_config.php';

// Check if the 'id' parameter is set in the GET request
if (isset($_GET['id'])) {
    // Retrieve the 'id' parameter from the GET request
    $id = $_GET['id'];

    // Prepare and execute an SQL query to fetch the user data based on the provided ID
    // Using parameterized queries is recommended to prevent SQL injection
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id); // Bind the 'id' as an integer
    $stmt->execute(); // Execute the query
    $result = $stmt->get_result(); // Get the result set

    // Fetch the user data as an associative array
    $row = $result->fetch_assoc();

    // Close the prepared statement and database connection
    $stmt->close();
    $mysqli->close();
} else {
    // If 'id' is not set, redirect to the view data page
    header("Location: view_data.php");
    exit(); // Ensure no further code is executed
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS for styling -->
</head>
<body>
    <div class="container">
        <h1>Edit Data</h1>

        <!-- Form to edit user data -->
        <form method="POST" action="update.php">
            <!-- Hidden input to pass the user ID to the update script -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

            <!-- Input field for the user's name -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

            <!-- Input field for the user's email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

            <!-- Submit button to update the data -->
            <input type="submit" value="Update">
        </form>

        <!-- Link to navigate back to the view data page -->
        <a href="view_data.php" class="back-link">Back to View Data</a>
    </div>
</body>
</html>