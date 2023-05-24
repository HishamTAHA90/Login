<?php
include "../classes/dbh.classes.php";
include "../classes/login.classes.php";
include "../classes/loginCont.classes.php";
include "../classes/achatController.classes.php";
include "../classes/achat.classes.php";



// Récupérer les données du formulaire
// Démarrer une session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header('Location: login.php');
    exit;
}

// Récupérer l'ID de l'utilisateur à partir de la variable de session
$user_id = $_SESSION['id'];
// TODO: remplacer avec l'ID de l'utilisateur actuellement connecté
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Instancier la classe AchatCont pour interagir avec la base de données
$achatCont = new AchatController();

// Ajouter l'achat à la base de données
$achatCont->addAchat($user_id, $product_id, $quantity);

// Rediriger vers la page du panier
header('Location: ../achat-details.php');
exit;
