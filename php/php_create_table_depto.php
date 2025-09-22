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
$sql = "CREATE TABLE depto (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dnombre VARCHAR(30) NOT NULL,
dgerente VARCHAR(30) NOT NULL,
demail VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table depto created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
