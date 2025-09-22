<?php
header("Content-Type: application/json; charset=UTF-8");
$lnum = $_GET["lnum"];
$luser = $_GET["luser"];
$lcount = $_GET["lcount"];
$lcounth = $_GET["lcounth"];
$lregion = $_GET["lregion"];
$lcompany = $_GET["lcompany"];
$lplan = $_GET["lplan"];
$lrent = $_GET["lrent"];
$ldates = $_GET["ldates"];
$ldatef = $_GET["ldatef"];

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
$stmt = $conn->prepare("INSERT INTO line (linenum, lineuser, linecount, linecounth, lineregion, linecompany, lineplan, linerent, linedates, linedatef) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $lnum, $luser, $lcount, $lcounth, $lregion, $lcompany, $lplan, $lrent, $ldates, $ldatef);
$stmt->execute();

$conn->close();
?>
