<?php 
require ('database.php');
session_start();

// check if the user is logged in; if not send to 405.html.
if (!isset($_SESSION['valid']) || $_SESSION['valid'] != true) {
	header('location:405.html');
}

// check if all the required info is filled in.
if (!isset($_POST['team1'])) {
	$message = "vul alles in.";
	header("location:../public/invoeren_resultaten.php?team1=$message");
}
else{
	
}

if (!isset($_POST['team2'])) {
	$message = "vul alles in.";
	header("location:../public/invoeren_resultaten.php?team1=$message");
}
else{

}

if (!isset($_POST['point1'])) {
	$message = "vul alles in.";
	header("location:../public/invoeren_resultaten.php?team1=$message");
}
else{

}

if (!isset($_POST['point2'])) {
	$message = "vul alles in.";
	header("location:../public/invoeren_resultaten.php?team1=$message");
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
if (isset($scoorder1) && isset($scoorder2)) {
	$scoorder1 = array_count_values($scoorder1);
	$scoorder2 = array_count_values($scoorder2);

	// update the amount of goals every player scored.
	foreach ($scoorder1 as $key => $points) {
		$sql = "UPDATE `tbl_players` SET `goals` = $points WHERE `id` = $key";
		mysqli_query($db, $sql);
	}
	foreach ($scoorder2 as $key => $points) {
		$sql = "UPDATE `tbl_players` SET `goals` = $points WHERE `id` = $key";
		mysqli_query($db, $sql);
	}

	// get team_id_a
	$team1 = $_POST['team1'];
	$sql = "SELECT `id` FROM `tbl_teams` WHERE `name` = $team1";
	$obj = mysqli_fetch_object(mysqli_query($db, $sql));
	$team1 = $obj->id;

	// get team_id_b
	$team2 = $_POST['team2'];
	$sql = "SELECT `id` FROM `tbl_teams` WHERE `name` = $team2";
	$obj = mysqli_fetch_object(mysqli_query($db, $sql));
	$team2 = $obj->id;

	// get score_team_a
	$point1 = $_POST['point1'];

	// get score_team_b
	$point2 = $_POST['point2'];

	$sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`, `score_team_a`, `score_team_b`) 
	VALUES ($team1, $team2, $point1, $point2)";
	var_dump($team1);
	var_dump($team2);
	var_dump($point1);
	var_dump($point2);

	// unset($_SESSION['scoorder1']);
	// unset($_SESSION['scoorder2']);
}


