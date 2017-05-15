<?php 
require("database.php");
session_start();

$ready = true;
if (!isset($_POST['submit'])) {
	$ready = false;
}

if (!isset($_POST['teamname'])) {
	$ready = false;
}

// inset team name without players.

$poule = 1;
if ($ready == true) {

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
    		$ready = false;
    	}
    	else{
    		$check["$name"] = '1';
    	}

    	if ($obj->name == $_SESSION['selectTeam']) {
    		$ready = false;
    	}

	}
	if ($ready == true) {
		echo "true";
		$sql = "INSERT INTO `tbl_teams` (`poule_id`, `name`) VALUES ('".$poule."', '".$_POST['teamname']."')";
		mysqli_query($db, $sql);
		header("location:../public/invoeren_TS.php");
	}

	if ($ready == false) {
		echo "false";
		$sql = "UPDATE `tbl_teams` SET `poule_id` = '".$poule."', `name` = '".$_POST['teamname']."' WHERE `name` = '".$_SESSION['selectTeam']."'";
		mysqli_query($db, $sql);
		$_SESSION['selectTeam'] = $_POST['teamname'];
		header("location:../public/invoeren_TS.php");
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

echo "<br>end of the line.";
