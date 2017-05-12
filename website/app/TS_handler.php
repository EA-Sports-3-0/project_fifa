<?php 
require("database.php");

$ready = true;
if (!isset($_POST['submit'])) {
	$ready = false;
}

if (!isset($_POST['teamname'])) {
	$ready = false;
}

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
	}
	if ($ready = true) {
		$sql = "INSERT INTO `tbl_teams` (`poule_id`, `name`) VALUES ('".$poule."', '".$_POST['teamname']."')";
		mysqli_query($db, $sql);
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

	if (isset($_POST[$obj->name]) && $_POST[$obj->name] == 'X') {
		echo $obj->name;

		$sql = "DELETE FROM `tbl_teams` WHERE `name` = '".$obj->name."'";
		mysqli_query($db, $sql);
		header("location:../public/invoeren_TS.php");
	}
}

echo "<br>end of the line.";
