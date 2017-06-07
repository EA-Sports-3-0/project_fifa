<?php 
require("database.php");
session_start();

if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true) {
	header('location:405.html');
}

$sql = "UPDATE `tbl_players` SET `goals` = 0";
$db->query($sql);

$sql = "SELECT * FROM `tbl_teams`";
$teamCount = $db->query($sql)->rowCount();
$teams = array();
$teamsid = array();
$id = 0;
for ($i=0; $i < $teamCount; $i++) { 
	$sql = "SELECT `id`, `name` FROM `tbl_teams` WHERE `id` > $id";
	$result = $db->query($sql);
	$obj = $result->fetch(PDO::FETCH_ASSOC);
	$id = $obj['id'];
	$team = $obj['name'];

	array_push($teams, $team);
	array_push($teamsid, $id);

}
$amountOT = count($teams);
$amountOG = $amountOT - 1;
$date = date("Y-m-d H:i:s"); 

$sql = "DELETE FROM `tbl_matches`";
$db->query($sql);
$sql = "UPDATE `tbl_teams` SET `poule_id` = '2'";
$db->query($sql);

if ($amountOT >= 2) {
	$sql = "UPDATE `tbl_teams` SET `place_id` = '1' WHERE `id` = '".$teamsid['0']."'";
	$db->query($sql);
	$sql = "UPDATE `tbl_teams` SET `place_id` = '2' WHERE `id` = '".$teamsid['1']."'";
	$db->query($sql);
	$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['0']."', '".$teamsid['1']."', '".$date."','2', '1')";
	$db->query($sql);

	if ($amountOT == 3) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = 'w2' WHERE `id` = '".$teamsid['2']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['2']."', '".$date."','1', 'w1')";
		$db->query($sql);
	}
	if($amountOT >= 4) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = '3' WHERE `id` = '".$teamsid['2']."'";
		$db->query($sql);
		$sql = "UPDATE `tbl_teams` SET `place_id` = '4' WHERE `id` = '".$teamsid['3']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['2']."', '".$teamsid['3']."', '".$date."','2', '2')";
		$db->query($sql);
	}

	if ($amountOT == 5) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = 'ww2' WHERE `id` = '".$teamsid['4']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['4']."', '".$date."','1', 'w2')";
		$db->query($sql);
	}
	if($amountOT >= 6) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = '5' WHERE `id` = '".$teamsid['4']."'";
		$db->query($sql);
		$sql = "UPDATE `tbl_teams` SET `place_id` = '6' WHERE `id` = '".$teamsid['5']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['4']."', '".$teamsid['5']."', '".$date."','2', '3')";
		$db->query($sql);
	}

	if ($amountOT == 7) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = 'w4' WHERE `id` = '".$teamsid['6']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['6']."', '".$date."','1', 'w2')";
		$db->query($sql);
	}
	if($amountOT >= 8) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = '7' WHERE `id` = '".$teamsid['6']."'";
		$db->query($sql);
		$sql = "UPDATE `tbl_teams` SET `place_id` = '8' WHERE `id` = '".$teamsid['7']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['6']."', '".$teamsid['7']."', '".$date."','2', '4')";
		$db->query($sql);
	}

	if ($amountOT == 9) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = 'www2' WHERE `id` = '".$teamsid['8']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['8']."', '".$date."','1', 'www1')";
		$db->query($sql);
	}
	if($amountOT >= 10) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = '9' WHERE `id` = '".$teamsid['8']."'";
		$db->query($sql);
		$sql = "UPDATE `tbl_teams` SET `place_id` = '10' WHERE `id` = '".$teamsid['9']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['8']."', '".$teamsid['9']."', '".$date."','2', '5')";
		$db->query($sql);
	}

	if ($amountOT == 11) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = 'w6' WHERE `id` = '".$teamsid['10']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['10']."', '".$date."','1', 'w3')";
		$db->query($sql);
	}
	if($amountOT >= 12) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = '11' WHERE `id` = '".$teamsid['10']."'";
		$db->query($sql);
		$sql = "UPDATE `tbl_teams` SET `place_id` = '12' WHERE `id` = '".$teamsid['11']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['10']."', '".$teamsid['11']."', '".$date."','2', '6')";
		$db->query($sql);
	}

	if ($amountOT == 13) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = 'ww4' WHERE `id` = '".$teamsid['12']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['12']."', '".$date."','1', 'ww2')";
		$db->query($sql);
	}
	if($amountOT >= 14) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = '13' WHERE `id` = '".$teamsid['12']."'";
		$db->query($sql);
		$sql = "UPDATE `tbl_teams` SET `place_id` = '14' WHERE `id` = '".$teamsid['13']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['12']."', '".$teamsid['13']."', '".$date."','2', '7')";
		$db->query($sql);
	}

	if ($amountOT == 15) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = 'w8' WHERE `id` = '".$teamsid['14']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['14']."', '".$date."','1', 'w4')";
		$db->query($sql);
	}
	if($amountOT >= 16) {
		$sql = "UPDATE `tbl_teams` SET `place_id` = '15' WHERE `id` = '".$teamsid['14']."'";
		$db->query($sql);
		$sql = "UPDATE `tbl_teams` SET `place_id` = '16' WHERE `id` = '".$teamsid['15']."'";
		$db->query($sql);
		$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `start_time`, `poule_id`, `place_id`) VALUES('".$teamsid['14']."', '".$teamsid['15']."', '".$date."','2', '8')";
		$db->query($sql);
	}
}
$poule1 = 0;
if (0 == $amountOT % 2) {
	$poule1 = $amountOT / 2;
}
else{
	$poule1 = $amountOT / 2;
	$poule1 += 0.5;
}

for ($i=0; $i < $poule1; $i++) { 
	$sql = "UPDATE `tbl_teams` SET `poule_id` = '1' WHERE `id` = '".$teamsid[$i]."'";
	$db->query($sql);
}
header("location:../public/finals_admin.php");