<?php
require("database.php");
session_start();
if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true) {
	header('location:405.html');
}

$sql = "SELECT * FROM tbl_matches";
$con = $db->query($sql);
$fp = fopen('php://output', 'w');
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'."matches.csv".'"');
while ($row = $con->fetch(PDO::FETCH_ASSOC)) {
    $outpu = "\"" . $row['id'] . "\";\"" . $row['team_id_a'] ."\";\"" .$row['team_id_b'] ."\";\"" .$row['score_team_a'] ."\";\"" .$row['score_team_b']. "\"\n";
    echo $outpu;

}