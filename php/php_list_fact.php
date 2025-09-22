<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infraame";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT line.id, line.linenum, line.linerent, line.lineidle, fact.fyear as fyear, fact.fmonth as fmonth, fact.fcort as fcort, fact.fnumf as fnumf, fact.fplan as fplan, fact.fconnac as fconnac, fact.fconint as fconint, fact.fservt as fservt, fact.fiva as fiva, fact.ftotal as ftotal, user.firstname as ufirstname, user.lastname as ulastname, (SELECT depto.dnombre FROM depto WHERE depto.id=user.depto) AS udepto, (SELECT puesto.pnombre FROM puesto WHERE puesto.id=user.puesto) AS upuesto, (SELECT puesto.ptipo FROM puesto WHERE puesto.id=user.puesto) AS utipo FROM line LEFT JOIN fact ON line.id=fact.fline LEFT JOIN user ON line.lineuser=user.id ORDER BY line.id LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
