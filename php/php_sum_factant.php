<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infraame";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT sum(line.linerent) AS sumRent, sum(fact2411.fplan) AS sumPlan, sum(fact2411.fconnac) AS sumConnac, sum(fact2411.fconint) AS sumConint, sum(fact2411.fservt) AS sumServt FROM line INNER JOIN fact2411 ON line.id=fact2411.fline LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
