<?php 

// Include the database configuration file to establish a connection
include 'db_config.php';

// Initialize a message variable to store feedback for the user
$message = '';

// Check if the form was submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve the name and email values from the submitted form
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Prepare an SQL statement to insert the data into the 'users' table
  $stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");

  // Bind the parameters (name and email) to the prepared statement
  $stmt->bind_param("ss", $name, $email);

  // Check if the statement was prepared successfully
  if ($stmt) {
    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
      // If successful, set a success message
      $message = '<div>Data inserted successfully!</div>';
    } else {
      // If execution fails, set an error message with details
      $message = "Error inserting data: " . $stmt->error;
    }
    // Close the prepared statement
    $stmt->close();
  } else {
    // If the statement preparation fails, set an error message
    $message = "Error preparing the statement.";
  }
}

// Close the database connection
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MySQL Connection Test</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>MySQL Connection Test</h1>

    <!-- Link to view the data stored in the database -->
    <div><a href="view_data.php">View Data</a></div>

    <!-- Display the feedback message (success or error) -->
    <?php echo $message; ?>

    <!-- Form to collect user input (name and email) -->
    <form method="POST" action="">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>