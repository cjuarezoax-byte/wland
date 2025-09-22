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
$sql = "CREATE TABLE line (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
linenum VARCHAR(30) NOT NULL,
lineuser INT(6) NOT NULL,
linecount VARCHAR(30),
linecounth VARCHAR(30),
lineregion VARCHAR(30),
linecompany VARCHAR(30),
lineplan VARCHAR(30),
linerent DECIMAL(10, 2),
linedates DATE,
linedatef DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table line created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
