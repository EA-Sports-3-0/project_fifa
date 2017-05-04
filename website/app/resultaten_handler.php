<?php 
require ('../app/database.php');
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

var_dump(array_count_values($scoorder1));

$scoorder1 = array_count_values($scoorder1);
$scoorder2 = array_count_values($scoorder2);

foreach ($scoorder1 as $key => $points) {
	var_dump($scoorder1);
	var_dump($key);
	var_dump($points);


	// echo "$scoorder<br>";

	// $sql = "UPDATE `tbl_players` SET `goals` = $points WHERE `id` == $scoorder";
	// mysqli_query($db, $sql);

}
