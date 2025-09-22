<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infraame";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT line.id, line.linenum, user.email as lineuser, line.linecount, line.linecounth, line.lineregion, line.linecompany, line.lineplan, line.linerent, line.linedates, line.linedatef, line.lineidle, line.reg_date FROM line INNER JOIN user ON line.lineuser=user.id LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
