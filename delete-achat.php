<?php
include "classes/dbh.classes.php";
include "classes/achatController.classes.php";

if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];

    $achatController = new AchatController();
    $deleteAchat = $achatController->deleteAchat($deleteId);

    if ($deleteAchat) {
        // Si la suppression s'est déroulée avec succès
        header('Location: achat-details.php');
        exit;
    } else {
        // Si la suppression a échoué
        echo "Une erreur est survenue lors de la suppression de l'article.";
    }
} else {

    header('Location: achat-details.php');
    exit;
}
