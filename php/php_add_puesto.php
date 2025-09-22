<?php
header("Content-Type: application/json; charset=UTF-8");
$pnombre = $_GET["pnombre"];
$ptipo = $_GET["ptipo"];
$pdesc = $_GET["pdesc"];

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
$stmt = $conn->prepare("INSERT INTO puesto (pnombre, ptipo, pdesc) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $pnombre, $ptipo, $pdesc);
$stmt->execute();

$conn->close();
?>
