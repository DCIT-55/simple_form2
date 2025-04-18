
<?php
include 'db_config.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $mysqli->query(query: "SELECT * FROM users WHERE id = $id");
    $row = $result->fetch_assoc();
    $mysqli->close();

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Data</h1>
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            <input type="submit" value="Update">
        </form>
        <a href="view_data.php" class="back-link">Back to View Data</a>
    </div>
</html>