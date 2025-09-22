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
$sql = "CREATE TABLE licence (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
lnombre VARCHAR(60) NOT NULL,
ltipo VARCHAR(30) NOT NULL,
lprecio DECIMAL(10, 2),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table licence created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
