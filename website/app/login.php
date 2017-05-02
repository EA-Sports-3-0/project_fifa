<?php

require ('database.php');

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $isLoggedIn = false;
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        //send to login page
        header("location:../public/index.php");
    }

    $sql = "SELECT * FROM tbl_users
            WHERE username = '$myusername' &&
            password = '$mypassword'";

    //mysqli type query. if you cant execut it: check database.php to see if it is also set to mysqli.
    $match = mysqli_query($db, $sql)->num_rows;

    if ($match == 1) {

        $sql = "SELECT admin FROM tbl_users WHERE username = '$myusername'";

        $handler = mysqli_query($db, $sql);

        $_SESSION['valid'] = true;
    }
    //send to home page.
    header("location:../public/index.php");
}
