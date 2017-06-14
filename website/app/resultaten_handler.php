<?php 
require ('database.php');
session_start();
$ready = true;
if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true) {
	header('location:405.html');
}

if (!isset($_SESSION['team1'])) {
	$message = "vul alles in.";
	header("location:../public/invoeren_resultaten.php?team1=$message");
	$ready = false;
	echo "ready == false<br>";
}
else{
	
}

if (!isset($_SESSION['team2'])) {
	$message = "vul alles in.";
	header("location:../public/invoeren_resultaten.php?team1=$message");
	$ready = false;
	echo "ready == false<br>";
}
else{

}

if (!isset($_POST['point1'])) {
	$message = "vul alles in.";
	header("location:../public/invoeren_resultaten.php?team1=$message");
	$ready = false;
	echo "ready == false<br>";
}
else{

}

if (!isset($_POST['point2'])) {
	$message = "vul alles in.";
	header("location:../public/invoeren_resultaten.php?team1=$message");
	$ready = false;
	echo "ready == false<br>";
}
else{

}

if (isset($_SESSION['scoorder1'])) {
	$scoorder1 = $_SESSION['scoorder1'];
}

if (isset($_SESSION['scoorder2'])) {
	$scoorder2 = $_SESSION['scoorder2'];
}
if (isset($scoorder1)) {
	$scoorder1 = array_count_values($scoorder1);
	foreach ($scoorder1 as $key => $points) {
		$id = 0;
		$sql = "SELECT * FROM `tbl_players`";
		$teamCount = $db->query($sql)->rowCount();
		for ($i=1; $i <= $teamCount; $i++) {
			$sql = "SELECT * FROM `tbl_players` WHERE `id` > $id";
			$result = $db->query($sql);
	    	$obj = $result->fetch(PDO::FETCH_ASSOC);
			$id = $obj['id'];
			$name = $obj['first_name']." ".$obj['last_name'];
			if ($name == $key) {
				$sql = "UPDATE `tbl_players` SET `goals` = $points WHERE `id` = $id";
				$db->query($sql);
			}
		}
	}
}
if (isset($scoorder2)) {
	$scoorder1 = array_count_values($scoorder2);
	foreach ($scoorder2 as $key => $points) {
		$id = 0;
		$sql = "SELECT * FROM `tbl_players`";
		$teamCount = $db->query($sql)->rowCount();
		for ($i=1; $i <= $teamCount; $i++) {
			$sql = "SELECT * FROM `tbl_players` WHERE `id` > $id";
			$result = $db->query($sql);
	    	$obj = $result->fetch(PDO::FETCH_ASSOC);
			$id = $obj['id'];
			$name = $obj['first_name']." ".$obj['last_name'];
			if ($name == $key) {
				$sql = "UPDATE `tbl_players` SET `goals` = $points WHERE `id` = $id";
				$db->query($sql);
			}
		}
	}
}

if($ready == true) {

	$team1 = $_SESSION['team1'];
	
	$team2 = $_SESSION['team2'];
	
	$point1 = $_POST['point1'];

	$point2 = $_POST['point2'];

	$date = date("Y-m-d H:i:s"); 
	if (isset($_SESSION['team1']) && isset($_SESSION['team2']) && $_SESSION['team1'] != "" && $_SESSION['team2'] != "") {
		$sql = $db->prepare("SELECT * FROM `tbl_matches` WHERE `team_id_a` = ? AND `team_id_b` = ?");
		$sql->execute(array("$team1", "$team2"));
		$obj = $sql->fetch(PDO::FETCH_ASSOC);
		$this_place_id = $obj['place_id'];
		$team_id_a = $obj['team_id_a'];
		$team_id_b = $obj['team_id_b'];
		$score_team_a = $obj['score_team_a'];
		$score_team_b = $obj['score_team_b'];

		$sql = "SELECT * FROM `tbl_matches`";
		$matchCount = $db->query($sql)->rowCount();
		$id = 0;
		$matches = array();
		for ($i=0; $i < $matchCount; $i++) { 
			$sql = "SELECT * FROM `tbl_matches` WHERE `id` > '$id'";
			$result = $db->query($sql);
			$obj = $result->fetch(PDO::FETCH_ASSOC);
			$id = $obj['id'];
			$match = $obj['place_id'];
			array_push($matches, $match);
		}

		$sql = "SELECT * FROM `tbl_matches` WHERE `place_id` = '$this_place_id'";
		$result = $db->query($sql);
		$obj = $result->fetch(PDO::FETCH_ASSOC);
		$team_id_a = $obj['team_id_a'];
		$team_id_b = $obj['team_id_b'];

		$upgrades = array(
	 	'1' => 'w1',
		'2' => 'w1',
		'3' => 'w2',
		'4' => 'w2',
		'5' => 'w3',
		'6' => 'w3',
		'7' => 'w4',
		'8' => 'w4',
		'9' => 'w5',
		'10' => 'w5',
		'11' => 'w6',
		'12' => 'w6',
		'13' => 'w7',
		'14' => 'w7',
		'15' => 'w8',
		'16' => 'w8',
		'w1' => 'ww1',
		'w2' => 'ww1',
		'w3' => 'ww2',
		'w4' => 'ww2',
		'w5' => 'ww3',
		'w6' => 'ww3',
		'w7' => 'ww4',
		'w8' => 'ww4',
		'ww1' => 'www1',
		'ww2' => 'www1',
		'ww3' => 'www2',
		'ww4' => 'www2',
		'www1' => 'wwww1',
		'www2' => 'wwww1',
		'wwww1' => 'wwwww',
		'wwwww' => 'wwwww');

		$next_place_id = $upgrades[$this_place_id];
		if (!isset($obj['score_team_a']) || !isset($obj['score_team_b']) || $obj['score_team_a'] == NULL || $obj['score_team_a'] == NULL) {
			if ($point1 > $point2) {
				$sql = "SELECT * FROM `tbl_teams` WHERE `id` = '$team_id_a'";
				$result = $db->query($sql);
				$obj = $result->fetch(PDO::FETCH_ASSOC);
				$this_place_id_t = $obj['place_id'];
				$next_place_id_t = $upgrades[$this_place_id_t];
				if (!in_array($next_place_id, $matches)) {
					$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `start_time`, `place_id`, `poule_id`) VALUES('$team_id_a', '$date', '$next_place_id', '2')";
					$db->query($sql);
					$sql = "UPDATE `tbl_teams` SET `place_id` = '$next_place_id_t' WHERE `place_id` = '$this_place_id_t'";
					$db->query($sql);
				}
				elseif (in_array($next_place_id, $matches)) {
					$sql = "SELECT * FROM `tbl_matches` WHERE `place_id` = '$next_place_id'";
					$result = $db->query($sql);
					$obj = $result->fetch(PDO::FETCH_ASSOC);
					$teamb = $obj['team_id_b'];
					if (isset($teamb) && $teamb != "") {
						$sql = "UPDATE `tbl_matches` SET `team_id_a` = '$team_id_a' WHERE `place_id` = '$next_place_id'";
						$db->query($sql);
						$sql = "UPDATE `tbl_teams` SET `place_id` = '$next_place_id_t' WHERE `place_id` = '$this_place_id_t'";
						$db->query($sql);
					}
					else {
						$sql = "UPDATE `tbl_matches` SET `team_id_b` = '$team_id_a' WHERE `place_id` = '$next_place_id'";
						$db->query($sql);
						$sql = "UPDATE `tbl_teams` SET `place_id` = '$next_place_id_t' WHERE `place_id` = '$this_place_id_t'";
						$db->query($sql);
					}
				}
			}
			elseif($point1 < $point2){
				$sql = "SELECT * FROM `tbl_teams` WHERE `id` = '$team_id_b'";
				$result = $db->query($sql);
				$obj = $result->fetch(PDO::FETCH_ASSOC);
				$this_place_id_t = $obj['place_id'];
				$next_place_id_t = $upgrades[$this_place_id_t];
				if (!in_array($next_place_id, $matches)) {
					$sql = "INSERT INTO `tbl_matches` (`team_id_b`, `start_time`, `place_id`, `poule_id`) VALUES('$team_id_b', '$date', '$next_place_id', '2')";
					$db->query($sql);
					$sql = "UPDATE `tbl_teams` SET `place_id` = '$next_place_id_t' WHERE `place_id` = '$this_place_id_t'";
					$db->query($sql);
				}
				elseif (in_array($next_place_id, $matches)) {
					$sql = "SELECT * FROM `tbl_matches` WHERE `place_id` = '$next_place_id'";
					$result = $db->query($sql);
					echo $sql;
					$obj = $result->fetch(PDO::FETCH_ASSOC);
					$teamb = $obj['team_id_b'];
					if (isset($teamb) && $teamb != "") {
						$sql = "UPDATE `tbl_matches` SET `team_id_a` = '$team_id_b' WHERE `place_id` = '$next_place_id'";
						$db->query($sql);
						$sql = "UPDATE `tbl_teams` SET `place_id` = '$next_place_id_t' WHERE `place_id` = '$this_place_id_t'";
						$db->query($sql);
					}
					else {
						$sql = "UPDATE `tbl_matches` SET `team_id_b` = '$team_id_b' WHERE `place_id` = '$next_place_id'";
						$db->query($sql);
						$sql = "UPDATE `tbl_teams` SET `place_id` = '$next_place_id_t' WHERE `place_id` = '$this_place_id_t'";
						$db->query($sql);
					}
				}
			}
		}
	}
	if ($point1 != $point2) {
		if ($point1 == "") {
			$point1 = 0;
		}
		if ($point2 == "") {
			$point2 = 0;
		}
		$sql = $db->prepare("UPDATE `tbl_matches` SET `score_team_a` = ?, `score_team_b` = ? WHERE `place_id` = '$this_place_id'");
		$sql->execute(array($point1, $point2));
	}

	unset($_SESSION['scoorder1']);
	unset($_SESSION['scoorder2']);
	unset($_SESSION['team1']);
	unset($_SESSION['team2']);

}

header("location:../public/invoeren_resultaten.php");