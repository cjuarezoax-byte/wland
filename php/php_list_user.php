<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infraame";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT user.id AS id, user.firstname AS firstname, user.lastname AS lastname, user.email As email, depto.dnombre AS depto, puesto.pnombre AS puesto, user.reg_date AS reg_date FROM user LEFT JOIN depto ON user.depto=depto.id LEFT JOIN puesto ON user.puesto=puesto.id LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
