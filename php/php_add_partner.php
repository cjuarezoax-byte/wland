<?php
header("Content-Type: application/json; charset=UTF-8");
$prazon = $_GET["prazon"];
$pnombre = $_GET["pnombre"];
$pemail = $_GET["pemail"];

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
$stmt = $conn->prepare("INSERT INTO partner (prazon, pnombre, pemail) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $prazon, $pnombre, $pemail);
$stmt->execute();

$conn->close();
?>
