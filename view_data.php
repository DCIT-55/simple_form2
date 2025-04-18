<?php
include 'db_config.php';

$result = $mysqli->query("SELECT * FROM users");

$mysqli->close();

?>
<!DOCTYPE html>
<html>  

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <h1>View Data</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
                        <?php 
                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){
                        echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>
                                        <a href='delete.php?id={$row['id']}' class='delete-link'>Delete</a>
                                        <a href='edit.php?id={$row['id']}' class='edit-link'>Edit</a>
                                    </td>
                                </tr>";
                            }
                            } else {
                                echo "<tr><td colspan='4'>No records found</td></tr>";
                            }
                        ?>
                    </table>
                    <a href="index.php" class="back-link">Back to Form</a>
    </div>
</html>







<