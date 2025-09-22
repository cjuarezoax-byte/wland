<?php
header("Content-Type: application/json; charset=UTF-8");
$dnombre = $_GET["dnombre"];
$dgerente = $_GET["dgerente"];
$demail = $_GET["demail"];

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
$stmt = $conn->prepare("INSERT INTO depto (dnombre, dgerente, demail) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $dnombre, $dgerente, $demail);
$stmt->execute();

$conn->close();
?>
