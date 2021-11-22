<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBNAME = 'gallery';

// Create connection
$conn = new mysqli($servername, $username, $password,$DBNAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>