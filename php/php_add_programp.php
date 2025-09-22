<?php
header("Content-Type: application/json; charset=UTF-8");
$prpartner = $_GET["prpartner"];
$prservice = $_GET["prservice"];
$prtotal = $_GET["prtotal"];
$prdatec = $_GET["prdatec"];
$prdatev = $_GET["prdatev"];

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
$stmt = $conn->prepare("INSERT INTO programp (prpartner, prservice, prtotal, prdatec, prdatev) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $prpartner, $prservice, $prtotal, $prdatec, $prdatev);
$stmt->execute();

$conn->close();
?>
