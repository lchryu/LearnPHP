<?php
// Define connection constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'qlsv');

// Create a connection
$ketnoi = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check for connection errors
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set character set for the connection
mysqli_set_charset($ketnoi, 'utf8');

// Perform database queries and data manipulation here

?>
