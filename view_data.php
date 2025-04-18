<?php
// Include the database configuration file to establish a connection
include 'db_config.php';

// Execute a query to fetch all records from the 'users' table
$result = $mysqli->query("SELECT * FROM users");

// Close the database connection to free up resources
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS for styling -->
</head>
<body>
    <div class="container">
        <h1>View Data</h1>

        <!-- Table to display user data -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Check if there are any records in the result set
                if ($result->num_rows > 0) {
                    // Loop through each record and display it in a table row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['id']) . "</td>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>
                                    <!-- Links for editing and deleting the record -->
                                    <a href='edit.php?id=" . htmlspecialchars($row['id']) . "' class='edit-link'>Edit</a>
                                    <a href='delete.php?id=" . htmlspecialchars($row['id']) . "' class='delete-link'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    // If no records are found, display a message
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Link to navigate back to the form page -->
        <a href="index.php" class="back-link">Back to Form</a>
    </div>
</body>
</html>