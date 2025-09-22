<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infraame";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT sum(line.linerent) AS sumRent, sum(fact.fplan) AS sumPlan, sum(fact.fconnac) AS sumConnac, sum(fact.fconint) AS sumConint, sum(fact.fservt) AS sumServt FROM line LEFT JOIN fact ON line.id=fact.fline LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
