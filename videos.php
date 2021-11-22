<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM videos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["v_id"]. " <iframe width='560' height='315' src='https://www.youtube.com/embed/ " . $row["v_url"]. " frameborder='0' controls='2'  allowfullscreen></iframe> " . $row["v_date"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>