<?php

if (isset($_POST["submit"])) {
    //collecter les inputs de l'utilisateur
    $userName = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPwd = $_POST["confirm_password"];
}

//instancier SignupContr class
include "../classes/dbh.classes.php";
include "../classes/signup.classes.php";
include "../classes/signupContr.classes.php";

$signup = new User($userName, $email, $password, $confirmPwd);
//demarrer Errors
$signup->signupUser();
//returner vers la premiere page
header("location:../index.php?error=none");
