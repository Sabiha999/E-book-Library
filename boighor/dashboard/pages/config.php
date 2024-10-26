<?php
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = "";     // Update with your MySQL password
$dbname = "e_book";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}
?>