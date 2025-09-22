<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infraame";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT id, dnombre, dgerente, demail, reg_date FROM depto LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
