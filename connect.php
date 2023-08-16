<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'flutter_crud_db';

$conn = new mysqli($host, $username, $password, $database);

// Check if the conn was successful
if ($conn->connect_error) {
    die("conn failed: " . $conn->connect_error);
} 






