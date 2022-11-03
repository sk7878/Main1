<?php
$servername = "localhost";
$username = "sunarch";
$password = "12345";
$dbname = "userdetails";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
 echo "Connected successfully";
?>