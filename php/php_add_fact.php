<?php
header("Content-Type: application/json; charset=UTF-8");
$fyear = $_GET["fyear"];
$fmonth = $_GET["fmonth"];
$fline = $_GET["fline"];
$fcort = $_GET["fcort"];
$fnumf = $_GET["fnumf"];
$fconnac = $_GET["fconnac"];
$fconint = $_GET["fconint"];
$fservt = $_GET["fservt"];

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

// prepare and bind
$stmt = $conn->prepare("INSERT INTO fact (fyear, fmonth, fline, fcort, fnumf, fconnac, fconint, fservt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $fyear, $fmonth, $fline, $fcort, $fnumf, $fconnac, $fconint, $fservt);
$stmt->execute();

$conn->close();
?>
