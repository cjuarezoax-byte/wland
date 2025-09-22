<?php
header("Content-Type: application/json; charset=UTF-8");
$lnombre = $_GET["lnombre"];
$ltipo = $_GET["ltipo"];
$lprecio = $_GET["lprecio"];

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
$stmt = $conn->prepare("INSERT INTO licence (lnombre, ltipo, lprecio) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $lnombre, $ltipo, $lprecio);
$stmt->execute();

$conn->close();
?>
