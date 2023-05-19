<?php
// Database configuration
$host = 'localhost';
$dbname = 'qlsv';
$username = 'root';
$password = '';

// Create a PDO instance
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
