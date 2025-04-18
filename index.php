<?php 

include 'db_config.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Prepare and bind
    $stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    // Execute the statement
    // Close the statement
    if ($stmt){
      if($stmt->execute()){
        $message = '<div> Data inserted successfully!
        </div>';
        
      } else {
        $message = "Error inserting data: " . $stmt->error;
      }
    } 
    else {
  }
    
   
    // Close the statement
    $stmt->close();
}
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
        <div> <a href="view_data.php">View Data </div>
        
        <?php echo $message; ?>
        <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Submit">



        </form>
        
    </div>