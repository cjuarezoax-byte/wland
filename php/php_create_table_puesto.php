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
$sql = "CREATE TABLE puesto (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pnombre VARCHAR(30) NOT NULL,
ptipo VARCHAR(30) NOT NULL,
pdesc VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table puesto created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
