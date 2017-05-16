<?php 
require("database.php");
session_start();

$ready = 0;
if (!isset($_POST['submit'])) {
	$ready = 1;
}

if (!isset($_POST['teamname'])) {
	$ready = 1;
}

// inset team name without players.

$poule = 1;
if ($ready == 0) {

	$check = array();
	$id = 0;
	$sql = "SELECT * FROM `tbl_teams`";
	$teamCount = mysqli_num_rows(mysqli_query($db, $sql));
	for ($i=1; $i <= $teamCount; $i++) { 
		$sql = "SELECT * FROM `tbl_teams` WHERE `id` > $id";
		$result = mysqli_query($db, $sql);
		$obj = mysqli_fetch_object($result);
		$id = $obj->id;
		$name = $obj->name; 

		if (isset($check["$name"])) {
    		$ready = 1;
    	}
    	else{
    		$check["$name"] = '1';
    	}

    	if (isset($_SESSION['selectTeam']) && $obj->name != $_SESSION['selectTeam'] && $_POST['teamname'] != $_SESSION['selectTeam']){
    		$ready = 1;
    	}
    	else{
    		$ready = 2;
    	}

	}
	if ($ready == 0) {
		$sql = "INSERT INTO `tbl_teams` (`poule_id`, `name`) VALUES ('".$poule."', '".$_POST['teamname']."')";
		mysqli_query($db, $sql);
	}

	if ($ready == 1) {
		$sql = "UPDATE `tbl_teams` SET `poule_id` = '".$poule."', `name` = '".$_POST['teamname']."' WHERE `name` = '".$_SESSION['selectTeam']."'";
		mysqli_query($db, $sql);
		$_SESSION['selectTeam'] = $_POST['teamname'];
	}

	$team = $_POST['teamname'];

    $sql = "SELECT * FROM `tbl_teams` WHERE `name` = '$team'";
    $result = mysqli_query($db, $sql);
	$obj = mysqli_fetch_object($result);
	$teamid = $obj->id;

    $sql = "SELECT * FROM `tbl_players` WHERE `team_id` = '".$teamid."'";
    $matchCount = mysqli_num_rows(mysqli_query($db, $sql));
    $id = 0;
    $fnames = array("no.0");
	$lnames = array("no.0");
	$pids = array("no.0");
    for ($i=0; $i < $matchCount; $i++) { 
    	$sql = "SELECT * FROM `tbl_players` WHERE `team_id` = '$teamid' AND `id` > '$id'";
    	$result = mysqli_query($db, $sql);
		$obj = mysqli_fetch_object($result);
		$id = $obj->id;

    	$fname = $obj->first_name;
    	$lname = $obj->last_name;
    	$pid = $obj->id;

		array_push($fnames, "$fname");
	                    	
		array_push($lnames, "$lname");
		array_push($pids, $pid);


	}

	$sql = "SELECT * FROM `tbl_teams` WHERE `name` = '$team'";
    $result = mysqli_query($db, $sql);
	$obj = mysqli_fetch_object($result);
	$teamid = $obj->id;

	if ($ready == 2) {
		if (isset($_POST['first_name1']) && $_POST['first_name1'] != "") {
			if (!isset($fnames['1'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name1']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name1']."' WHERE `id` = '".$pids['1']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['last_name1']) && $_POST['last_name1'] != "") {
			if (!isset($lnames['1'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['last_name1']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name1']."' WHERE `id` = '".$pids['1']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['first_name2']) && $_POST['first_name2'] != "") {
			if (!isset($fnames['2'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name2']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name2']."' WHERE `id` = '".$pids['2']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['last_name2']) && $_POST['last_name2'] != "") {
			if (!isset($lnames['2'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['last_name2']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name2']."' WHERE `id` = '".$pids['2']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['first_name3']) && $_POST['first_name3'] != "") {
			if (!isset($fnames['3'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name3']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name3']."' WHERE `id` = '".$pids['3']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['last_name3']) && $_POST['last_name3'] != "") {
			if (!isset($lnames['3'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['last_name3']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name3']."' WHERE `id` = '".$pids['3']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['first_name4']) && $_POST['first_name4'] != "") {
			if (!isset($fnames['4'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name4']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name4']."' WHERE `id` = '".$pids['4']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['last_name4']) && $_POST['last_name4'] != "") {
			if (!isset($lnames['4'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['last_name4']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name4']."' WHERE `id` = '".$pids['4']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['first_name5']) && $_POST['first_name5'] != "") {
			if (!isset($fnames['5'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name5']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name5']."' WHERE `id` = '".$pids['5']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['last_name5']) && $_POST['last_name5'] != "") {
			if (!isset($lnames['5'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['last_name5']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name5']."' WHERE `id` = '".$pids['5']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['first_name6']) && $_POST['first_name6'] != "") {
			if (!isset($fnames['6'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name6']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name6']."' WHERE `id` = '".$pids['6']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['last_name6']) && $_POST['last_name6'] != "") {
			if (!isset($lnames['6'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['last_name6']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name6']."' WHERE `id` = '".$pids['6']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['first_name7']) && $_POST['first_name7'] != "") {
			if (!isset($fnames['7'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name7']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name7']."' WHERE `id` = '".$pids['7']."'";
				mysqli_query($db, $sql);
			}
		}
		if (isset($_POST['last_name7']) && $_POST['last_name7'] != "") {
			if (!isset($lnames['7'])) {
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['last_name7']."')";
				mysqli_query($db, $sql);
			}
			else{
				$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name7']."' WHERE `id` = '".$pids['7']."'";
				mysqli_query($db, $sql);
			}
		}
	}
}



$id = 0;
$sql = "SELECT * FROM `tbl_teams`";
$teamCount = mysqli_num_rows(mysqli_query($db, $sql));
for ($i=1; $i <= $teamCount; $i++) { 
	$sql = "SELECT * FROM `tbl_teams` WHERE `id` > $id";
	$result = mysqli_query($db, $sql);
	$obj = mysqli_fetch_object($result);
	$id = $obj->id;

	// delete team from database.
	if (isset($_POST[$obj->name]) && $_POST[$obj->name] == 'X') {
		echo $obj->name;

		$sql = "DELETE FROM `tbl_teams` WHERE `name` = '".$obj->name."'";
		mysqli_query($db, $sql);
		unset($_SESSION['selectTeam']);
		header("location:../public/invoeren_TS.php");
	}

	if (isset($_POST[$obj->name]) && $_POST[$obj->name] == $obj->name) {
		$_SESSION['selectTeam'] = $obj->name;
		header("location:../public/invoeren_TS.php");
	}

	if (isset($_POST['createNew'])) {
		unset($_SESSION['selectTeam']);
		header("location:../public/invoeren_TS.php");
	}
}

var_dump($fnames);

echo "<br>end of the line.";

header("location:../public/invoeren_TS.php");
