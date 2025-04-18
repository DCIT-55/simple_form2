<?php
// Database configuration file

// Define the database name
$db_db = 'test_db1';

// Define the socket path for the MySQL server (specific to MAMP setup)
$db_socket = '/Applications/MAMP/tmp/mysql/mysql.sock';

// Create a new MySQLi connection object
// Parameters:
// - $db_host: Hostname of the database server (e.g., localhost)
// - $db_user: Username for the database
// - $db_password: Password for the database user
// - $db_db: Name of the database to connect to
// - null: Port number (null means the default port will be used)
// - $db_socket: Path to the MySQL socket
$mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db,
    null,
    $db_socket
);

// Check if the connection was successful
if ($mysqli->connect_error) {
    // Display the error number and error message
    echo 'Errno: ' . $mysqli->connect_errno . '<br>';
    echo 'Error: ' . $mysqli->connect_error;

    // Terminate the script if the connection fails
    exit();
}

// If the connection is successful, the script will continue running
?>