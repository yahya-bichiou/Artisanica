<?php

include '../../Controller/DonController.php';

// Assurez-vous que l'ID de l'Don à supprimer est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Créer une instance du contrôleur
    $DonController = new DonController();

    // Récupérer l'ID de l'Don à supprimer
    $DonId = $_GET['id'];

    // Supprimer l'Don en utilisant le contrôleur
    $DonController->deletedonations($DonId);

    // Rediriger vers la liste des Dons après la suppression
    header('Location: tablesdon.php');
} else {
    // Rediriger vers la liste des Dons en cas d'ID manquant
    header('Location: tablesdon.php');
}

?>