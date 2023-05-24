<?php
include "../classes/dbh.classes.php";
include "../classes/adresse.classes.php";
include "../classes/adresseCont.classes.php";
include "../classes/loginCont.classes.php";
include "../classes/achatController.classes.php";
include "../classes/login.classes.php";




session_start();
if (!isset($_SESSION['id'])) {
    echo "errrror";
}

$user_id = $_SESSION['id'];
$rue = $_POST['rue'];
$ville = $_POST['ville'];
$cp = $_POST['codepostal'];
$pays = $_POST['pays'];
var_dump($user_id);


$adres = new AdresseCont();
$adres->addAdresse($user_id, $rue, $ville, $cp, $pays);
header("location:../adresse.php");
