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
$sql = "CREATE TABLE fact (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fyear VARCHAR(4) NOT NULL,
fmonth VARCHAR(2) NOT NULL,
fline INT(6),
fcort DATE,
fnumf VARCHAR(30),
fplan DECIMAL(10, 2),
fconnac DECIMAL(10, 2),
fconint DECIMAL(10, 2),
fservc DECIMAL(10, 2),
fajust DECIMAL(10, 2),
fdesc DECIMAL(10, 2),
fservs DECIMAL(10, 2),
fservt DECIMAL(10, 2),
fequip DECIMAL(10, 2),
fservo DECIMAL(10, 2),
fiva DECIMAL(10, 2),
ftotal DECIMAL(10, 2),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table fact created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
