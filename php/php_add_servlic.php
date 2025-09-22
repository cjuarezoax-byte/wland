<?php
header("Content-Type: application/json; charset=UTF-8");
$slnum = $_GET["slnum"];
$sluser = $_GET["sluser"];
$slpartner = $_GET["slpartner"];
$slstat = $_GET["slstat"];
$sldates = $_GET["sldates"];
$sldatef = $_GET["sldatef"];

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
$stmt = $conn->prepare("INSERT INTO servlic (slnum, sluser, slpartner, slstat, sldates, sldatef) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $slnum, $sluser, $slpartner, $slstat, $sldates, $sldatef);
$stmt->execute();

$conn->close();
?>
