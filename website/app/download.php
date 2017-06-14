<?php
require("database.php");
session_start();
if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true) {
	header('location:405.html');
}

$fp = fopen('php://output', 'w');
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'."data.csv".'"');

$sql = "SELECT * FROM `tbl_matches`";
$con = $db->query($sql);
while ($row = $con->fetch(PDO::FETCH_ASSOC)) {
    $outpu = "\"" . $row['id'] . "\";\"" . $row['team_id_a'] ."\";\"" .$row['team_id_b'] ."\";\"" .$row['score_team_a'] ."\";\"" .$row['score_team_b']. "\"\n";
    echo $outpu;
}

$sql = "SELECT * FROM `tbl_players`";
$con = $db->query($sql);
while ($row = $con->fetch(PDO::FETCH_ASSOC)) {
    $outpu = "\"" . $row['id'] . "\";\"" . $row['team_id'] ."\";\"" .$row['goals'] ."\";\"" .$row['first_name'] ."\";\"" .$row['last_name']. "\"\n";
    echo $outpu;
}

$sql = "SELECT * FROM `tbl_teams`";
$con = $db->query($sql);
while ($row = $con->fetch(PDO::FETCH_ASSOC)) {
    $outpu = "\"" . $row['id'] . "\";\"" . $row['name'] . "\"\n";
    echo $outpu;
}