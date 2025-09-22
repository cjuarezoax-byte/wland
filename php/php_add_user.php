<?php
header("Content-Type: application/json; charset=UTF-8");
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$email = $_GET["email"];

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
$stmt = $conn->prepare("INSERT INTO user (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $fname, $lname, $email);
$stmt->execute();

$conn->close();
?>
