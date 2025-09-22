<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infraame";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT programp.id AS id, partner.pnombre AS prpartner, programp.prservice AS prservice, programp.prtotal AS prtotal, programp.prdatec AS prdatec, programp.prdatev AS prdatev FROM programp LEFT JOIN partner ON programp.prpartner=partner.id LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
