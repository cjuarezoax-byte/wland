<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infraame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE partner (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
prazon VARCHAR(30) NOT NULL,
pnombre VARCHAR(30) NOT NULL,
pemail VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table partner created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
