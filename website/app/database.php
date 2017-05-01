<?php

$host = "localhost";
$dbname = "project_fifa";
$user = "root";
$pass = "";

// $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$db = mysqli_connect($host, $user, $pass, $dbname);