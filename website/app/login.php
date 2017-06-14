<?php
require ('database.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $isLoggedIn = false;
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        header("location:../public/index.php");
    }

    $sql = $db->prepare("SELECT * FROM tbl_users
            WHERE username = ? AND
            password = ?");
    $sql->execute(array("$myusername", "$mypassword"));
    $match = $sql->fetchColumn();

    if ($match == 1) {

        $_SESSION['valid'] = true;
    }
    header("location:../public/index.php");
}
