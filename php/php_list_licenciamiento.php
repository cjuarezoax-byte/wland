<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infraame";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT servlic.id AS id, licence.lnombre AS slnum, user.email AS sluser, partner.pnombre AS slpartner, servlic.slstat AS slstat, licence.lprecio AS slprecio, servlic.sldates AS sldates, servlic.sldatef AS sldatef, servlic.reg_date FROM servlic LEFT JOIN licence ON servlic.slnum=licence.id LEFT JOIN user ON servlic.sluser=user.id LEFT JOIN partner ON servlic.slpartner=partner.id LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
