<?php

include '../../Controller/EventController.php';

// Assurez-vous que l'ID de l'événement à supprimer est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Créer une instance du contrôleur
    $eventController = new EventController();

    // Récupérer l'ID de l'événement à supprimer
    $eventId = $_GET['id'];

    // Supprimer l'événement en utilisant le contrôleur
    $eventController->deleteEvent($eventId);

    // Rediriger vers la liste des événements après la suppression
    header('Location: tablesEvent.php');
} else {
    // Rediriger vers la liste des événements en cas d'ID manquant
    header('Location: tablesEvent.php');
}

?>