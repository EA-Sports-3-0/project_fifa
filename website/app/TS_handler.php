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

var_dump($_POST);

// inset team name without players.

if ($ready == 0) {

	$team = $_POST['teamname'];

    $sql = "SELECT * FROM `tbl_teams` WHERE `name` = '$team'";
    $result = $db->query($sql);
	$obj = $result->fetch(PDO::FETCH_ASSOC);
	$teamid = $obj['id'];

	$check = array();
	$id = 0;
	$sql = "SELECT * FROM `tbl_teams`";
	$teamCount = $db->query($sql)->rowCount();
	for ($i=1; $i <= $teamCount; $i++) { 
		$sql = "SELECT * FROM `tbl_teams` WHERE `id` > $id";
		$result = $db->query($sql);
    	$obj = $result->fetch(PDO::FETCH_ASSOC);
		$id = $obj['id'];
		$name = $obj['name']; 



		if (isset($check["$name"])) {
    		$ready = 1;
    	}
    	else{
    		$check["$name"] = '1';
    	}

    	if (isset($_SESSION['selectTeam']) && $obj['name'] != $_SESSION['selectTeam'] && $_POST['teamname'] != $_SESSION['selectTeam']){
    		$ready = 1;
    	}
	}
	if ($ready == 0) {
		$sql = "INSERT INTO `tbl_teams` (`poule_id`, `name`) VALUES ('1', '".$_POST['teamname']."')";
		$db->query($sql);

		$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name1']."', '".$_POST['last_name1']."')";
		$db->query($sql);
		
		$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name2']."', '".$_POST['last_name2']."')";
		$db->query($sql);
		
		$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name3']."', '".$_POST['last_name3']."')";
		$db->query($sql);
		
		$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name4']."', '".$_POST['last_name4']."')";
		$db->query($sql);
		
		$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name5']."', '".$_POST['last_name5']."')";
		$db->query($sql);

		$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name6']."', '".$_POST['last_name6']."')";
		$db->query($sql);

		$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST['first_name7']."', '".$_POST['last_name7']."')";
		$db->query($sql);
	}

	if ($ready == 1) {
		$sql = "UPDATE `tbl_teams` SET `poule_id` = '1', `name` = '".$_POST['teamname']."' WHERE `name` = '".$_SESSION['selectTeam']."'";
		$db->query($sql);
		$_SESSION['selectTeam'] = $_POST['teamname'];
	}

    $sql = "SELECT * FROM `tbl_players` WHERE `team_id` = '".$teamid."'";
    $match = $db->query($sql)->rowCount();

    $first_names = 0;
    $last_names = 0;
    if ($_POST['first_name1'] != "") {
    	$first_names++;
    }
    if ($_POST['first_name2'] != "") {
    	$first_names++;
    }
    if ($_POST['first_name3'] != "") {
    	$first_names++;
    }
    if ($_POST['first_name4'] != "") {
    	$first_names++;
    }
    if ($_POST['first_name5'] != "") {
    	$first_names++;
    }
    if ($_POST['first_name6'] != "") {
    	$first_names++;
    }
    if ($_POST['first_name7'] != "") {
    	$first_names++;
    }
    if ($_POST['last_name1'] != "") {
    	$last_names++;
    }
    if ($_POST['last_name2'] != "") {
    	$last_names++;
    }
    if ($_POST['last_name3'] != "") {
    	$last_names++;
    }
    if ($_POST['last_name4'] != "") {
    	$last_names++;
    }
    if ($_POST['last_name5'] != "") {
    	$last_names++;
    }
    if ($_POST['last_name6'] != "") {
    	$last_names++;
    }
    if ($_POST['last_name7'] != "") {
    	$last_names++;
    }

    $matchCount = max($match, $first_names, $last_names);

    $id = 0;
    $fnames = array("no.0");
    array_push($fnames, $_POST['first_name1']);
    array_push($fnames, $_POST['first_name2']);
    array_push($fnames, $_POST['first_name3']);
    array_push($fnames, $_POST['first_name4']);
    array_push($fnames, $_POST['first_name5']);
    array_push($fnames, $_POST['first_name6']);
    array_push($fnames, $_POST['first_name7']);

	$lnames = array("no.0");
	array_push($lnames, $_POST['last_name1']); 
	array_push($lnames, $_POST['last_name2']); 
	array_push($lnames, $_POST['last_name3']); 
	array_push($lnames, $_POST['last_name4']); 
	array_push($lnames, $_POST['last_name5']); 
	array_push($lnames, $_POST['last_name6']); 
	array_push($lnames, $_POST['last_name7']);

	$pids = array("no.0");
    for ($i=0; $i < 7; $i++) { 
    	$sql = "SELECT * FROM `tbl_players` WHERE `team_id` = '$teamid' AND `id` > '$id'";
    	$result = $db->query($sql);
    	$obj = $result->fetch(PDO::FETCH_ASSOC);
		$id = $obj['id'];


    	$pid = $obj['id'];

		array_push($pids, $pid);
	}

	var_dump($fnames);
	var_dump($lnames);

	$sql = "SELECT * FROM `tbl_teams` WHERE `name` = '$team'";
    $result = $db->query($sql);
	$obj = $result->fetch(PDO::FETCH_ASSOC);
	$teamid = $obj['id'];

	$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name1']."' WHERE `id` = '".$pids['1']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name1']."' WHERE `id` = '".$pids['1']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name2']."' WHERE `id` = '".$pids['2']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name2']."' WHERE `id` = '".$pids['2']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name3']."' WHERE `id` = '".$pids['3']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name3']."' WHERE `id` = '".$pids['3']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name4']."' WHERE `id` = '".$pids['4']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name4']."' WHERE `id` = '".$pids['4']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name5']."' WHERE `id` = '".$pids['5']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name5']."' WHERE `id` = '".$pids['5']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name6']."' WHERE `id` = '".$pids['6']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name6']."' WHERE `id` = '".$pids['6']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST['first_name7']."' WHERE `id` = '".$pids['7']."'";
	$db->query($sql);

	$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST['last_name7']."' WHERE `id` = '".$pids['7']."'";
	$db->query($sql);
			
		
	
}

$id = 0;
$sql = "SELECT * FROM `tbl_teams`";
$teamCount = $db->query($sql)->rowCount();
for ($i=1; $i <= $teamCount; $i++) { 
	$sql = "SELECT * FROM `tbl_teams` WHERE `id` > $id";
	$result = $db->query($sql);
	$obj = $result->fetch(PDO::FETCH_ASSOC);
	$id = $obj['id'];

	// delete team from database.
	if (isset($_POST[$obj['name']]) && $_POST[$obj['name']] == 'X') {
		echo $obj['name'];

		$sql = "DELETE FROM `tbl_teams` WHERE `name` = '".$obj['name']."'";
		$db->query($sql);
		unset($_SESSION['selectTeam']);
	}
	elseif (isset($_POST[$obj['name']]) && $_POST[$obj['name']] == $obj['name']) {
		$_SESSION['selectTeam'] = $obj['name'];
	}
	elseif (isset($_POST['createNew'])) {
		unset($_SESSION['selectTeam']);
	}
}

echo "<br>end of the line.";

// header("location:../public/invoeren_TS.php");
