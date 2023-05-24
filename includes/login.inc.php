<?php

if (isset($_POST["submit"])) {
    //collecter les inputs de l'utilisateur
    $userName = $_POST["username"];
    $password = $_POST["password"];
}

//instancier SignupContr class
include "../classes/dbh.classes.php";
include "../classes/login.classes.php";
include "../classes/loginCont.classes.php";

$login = new Login($userName,  $password);
//demarrer Errors
$login->loginUser();
//returner vers la premiere page
header("location:../pager.php?error=none");
