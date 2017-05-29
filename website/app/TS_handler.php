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

$team = $_POST['teamname'];
$sql = "SELECT * FROM `tbl_teams` WHERE `name` = '$team'";
$result = $db->query($sql);
$obj = $result->fetch(PDO::FETCH_ASSOC);
$teamid = $obj['id'];

if ($ready == 0) {

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
    	else{
    		$ready = 2;
    	}
	}
	if ($ready == 2) {
        if ($_POST['teamname'] != "") {
            $sql = "INSERT INTO `tbl_teams` (`poule_id`, `name`, `set_players`) VALUES ('1', '".$_POST['teamname']."', '0')";
            $db->query($sql);
        }

		$sql = "SELECT * FROM `tbl_teams` WHERE `name` = '".$_POST['teamname']."'";
		$result = $db->query($sql);
    	$obj = $result->fetch(PDO::FETCH_ASSOC);
		$set = $obj['set_players'];

		if ($set == 0) {
			for ($i=1; $i <= 7; $i++) { 
				$sql = "INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`, `last_name`) VALUES ('d000000', '".$teamid."', '0', '".$_POST["first_name$i"]."', '".$_POST["last_name$i"]."')";
				$db->query($sql);
			}
            $sql = "SELECT * FROM `tbl_players` WHERE `team_id` = '".$teamid."'";
            $result = $db->query($sql);
            $obj = $result->fetch(PDO::FETCH_ASSOC);
            if (isset($obj['id'])) {
                $sql = "UPDATE `tbl_teams` SET `set_players` = '1' WHERE `name` = '".$_POST['teamname']."'";
                $db->query($sql);
            }
		}
	}

	if ($ready == 1) {
		$sql = "UPDATE `tbl_teams` SET `poule_id` = '1', `name` = '".$_POST['teamname']."' WHERE `name` = '".$_SESSION['selectTeam']."'";
		$db->query($sql);
		$_SESSION['selectTeam'] = $_POST['teamname'];
	}

    $id = 0;
    $fnames = array("no.0");
    for ($i=1; $i <= 7; $i++) { 
    	array_push($fnames, $_POST["first_name$i"]);
    }

	$lnames = array("no.0");
	for ($i=1; $i <= 7; $i++) { 
    	array_push($lnames, $_POST["last_name$i"]); 
    }

	$pids = array("no.0");
    for ($i=0; $i < 7; $i++) { 
    	$sql = "SELECT * FROM `tbl_players` WHERE `team_id` = '$teamid' AND `id` > '$id'";
    	$result = $db->query($sql);
    	$obj = $result->fetch(PDO::FETCH_ASSOC);
		$id = $obj['id'];

    	$pid = $obj['id'];

		array_push($pids, $pid);
	}
	for ($i=1; $i <= 7; $i++) { 
		$sql = "UPDATE `tbl_players` SET `first_name` = '".$_POST["first_name$i"]."' WHERE `id` = '".$pids[$i]."'";
		$db->query($sql);
	}
	for ($i=1; $i <= 7; $i++) { 
		$sql = "UPDATE `tbl_players` SET `last_name` = '".$_POST["last_name$i"]."' WHERE `id` = '".$pids[$i]."'";
		$db->query($sql);
	}
}

$id = 0;
$sql = "SELECT * FROM `tbl_teams`";
$teamCount = $db->query($sql)->rowCount();
for ($i=1; $i <= $teamCount; $i++) { 
	$sql = "SELECT * FROM `tbl_teams` WHERE `id` > $id";
	$result = $db->query($sql);
	$obj = $result->fetch(PDO::FETCH_ASSOC);
	$id = $obj['id'];

	if (isset($_POST[$obj['name']]) && $_POST[$obj['name']] == 'X') {
        $sql = "UPDATE `tbl_teams` SET `set_players` = '0' WHERE `id` = '".$id."'";
        $db->query($sql);
        echo $sql."<br>";
		$sql = "DELETE FROM `tbl_teams` WHERE `id` = '".$id."'";
		$db->query($sql);
        echo $sql."<br>";
		$sql = "DELETE FROM `tbl_players` WHERE `team_id` = '".$id."'";
		$db->query($sql);
        echo $sql."<br>";
		unset($_SESSION['selectTeam']);
	}
	elseif (isset($_POST[$obj['name']]) && $_POST[$obj['name']] == $obj['name']) {
		$_SESSION['selectTeam'] = $obj['name'];
	}
	elseif (isset($_POST['createNew'])) {
		unset($_SESSION['selectTeam']);
	}
}

header("location:../public/invoeren_TS.php");
