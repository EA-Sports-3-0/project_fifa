<?php 
require("database.php");
session_start();

$sql = "SELECT * FROM `tbl_teams`";
$teamCount = $db->query($sql)->rowCount();
$teams = array();
$id = 0;
for ($i=0; $i < $teamCount; $i++) { 
	$sql = "SELECT `id`, `name` FROM `tbl_teams` WHERE `id` > $id";
	$result = $db->query($sql);
	$obj = $result->fetch(PDO::FETCH_ASSOC);
	$id = $obj['id'];
	$team = $obj['name'];

	array_push($teams, $team);
}
$amountOT = count($teams);
$amountOG = $amountOT - 1;

for ($i=0; $i < $amountOG; $i++) { 
	$sql = "INSERT INTO `tbl_matches` ";
}