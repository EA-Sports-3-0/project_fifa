<?php 
require ('database.php');
session_start();
$ready = true;
// check if the user is logged in; if not send to 405.html.
if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true) {
	header('location:405.html');
}

// check if all the required info is filled in.
if (!isset($_POST['team1'])) {
	$message = "vul alles in.";
	header("location:../public/invoeren_resultaten.php?team1=$message");
	$ready = false;
	echo "ready == false<br>";
}
else{
	
}

if (!isset($_POST['team2'])) {
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

// get the players who scoored from $_SESSION.

if (isset($_SESSION['scoorder1'])) {
	$scoorder1 = $_SESSION['scoorder1'];
}

if (isset($_SESSION['scoorder2'])) {
	$scoorder2 = $_SESSION['scoorder2'];
}
if (isset($scoorder1)) {
	$scoorder1 = array_count_values($scoorder1);
	var_dump($scoorder1);
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
	var_dump($scoorder2);
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

if($ready == true)
{
	echo "ready == true<br>";
	// get team_id_a
	$team1 = $_POST['team1'];
	$sql = "SELECT `id` FROM `tbl_teams` WHERE `name` = '$team1'";
	$result = $db->query($sql);
	$obj = $result->fetch(PDO::FETCH_ASSOC);
	$team1 = $obj['id'];

	// get team_id_b
	$team2 = $_POST['team2'];
	$sql = "SELECT `id` FROM `tbl_teams` WHERE `name` = '$team2'";
	$result = $db->query($sql);
	$obj = $result->fetch(PDO::FETCH_ASSOC);
	$team2 = $obj['id'];

	// get score_team_a
	$point1 = $_POST['point1'];

	// get score_team_b
	$point2 = $_POST['point2'];

	$date = date("Y-m-d H:i:s"); 

	$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `score_team_a`, `score_team_b`, `poule_id`, `start_time`) 
	VALUES ('$team1', '$team2', '$point1', '$point2', '1', '$date')";
	echo $sql;
	$db->query($sql);

	unset($_SESSION['scoorder1']);
	unset($_SESSION['scoorder2']);
}

header("location:../public/invoeren_resultaten.php");