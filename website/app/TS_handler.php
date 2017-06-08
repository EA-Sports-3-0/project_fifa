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


$sql = $db->prepare("SELECT * FROM `tbl_teams` WHERE `name` = ?");
$sql->execute(array($_POST['teamname']));
$obj = $sql->fetch(PDO::FETCH_ASSOC);
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
            $sql = $db->prepare("INSERT INTO `tbl_teams` (`poule_id`, `name`, `set_players`) VALUES ('2', ?, '0')");
            $sql->execute(array($_POST['teamname']));
            $sql = $db->prepare("SELECT * FROM `tbl_teams` WHERE `name` = ?");
			$sql->execute(array($_POST['teamname']));
			$obj = $sql->fetch(PDO::FETCH_ASSOC);
			$teamid = $obj['id'];
        }

		$sql = $db->prepare("SELECT * FROM `tbl_teams` WHERE `name` = ?");
		$sql->execute(array($_POST['teamname']));
		$obj = $sql->fetch(PDO::FETCH_ASSOC);
		$set = $obj['set_players'];

		if ($set == 0) {
			for ($i=1; $i <= 7; $i++) { 
				$sql = $db->prepare("INSERT INTO `tbl_players` (`student_id`, `team_id`, `goals`, `first_name`, `last_name`) VALUES ('d000000', ?, '0', ?, ?)");
				$sql->execute(array($teamid, $_POST["first_name$i"], $_POST["last_name$i"]));
			}
            $sql = $db->prepare("SELECT * FROM `tbl_players` WHERE `team_id` = ?");
            $sql->execute(array($teamid));
			$obj = $sql->fetch(PDO::FETCH_ASSOC);
            if (isset($obj['id'])) {
                $sql = $db->prepare("UPDATE `tbl_teams` SET `set_players` = '1' WHERE `name` = ?");
                $sql->execute(array($_POST['teamname']));
            }
		}
	}

	if ($ready == 1) {
		$sql = $db->prepare("UPDATE `tbl_teams` SET `poule_id` = '2', `name` = ? WHERE `name` = ?");
		$sql->execute(array($_POST['teamname'], $_SESSION['selectTeam']));
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
		$sql = $db->prepare("UPDATE `tbl_players` SET `first_name` = ? WHERE `id` = ?");
		$sql->execute(array($_POST["first_name$i"], $pids[$i]));
	}
	for ($i=1; $i <= 7; $i++) { 
		$sql = $db->prepare("UPDATE `tbl_players` SET `last_name` = ? WHERE `id` = ?");
		$sql->execute(array($_POST["last_name$i"], $pids[$i]));
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
        $sql = "DELETE FROM `tbl_players` WHERE `team_id` = '".$id."'";
		$db->query($sql);
        $sql = "DELETE FROM `tbl_matches` WHERE `team_id_a` = '".$id."' OR `team_id_b` = '".$id."'";
        $db->query($sql);
		$sql = "DELETE FROM `tbl_teams` WHERE `id` = '".$id."'";
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

header("location:../public/invoeren_TS.php");
