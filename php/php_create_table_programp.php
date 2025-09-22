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
$sql = "CREATE TABLE programp (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
prpartner INT(6) NOT NULL,
prservice VARCHAR(30) NOT NULL,
prtotal DECIMAL(10, 2),
prdatec DATE,
prdatev DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table programp created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
