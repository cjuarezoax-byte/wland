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
$sql = "CREATE TABLE servlic (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
slnum INT(6) NOT NULL,
sluser INT(6) NOT NULL,
slpartner INT(6) NOT NULL,
slstat VARCHAR(30) NOT NULL,
sldates DATE,
sldatef DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table servlic created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
