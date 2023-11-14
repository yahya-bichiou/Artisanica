<?php

include '../Controller/EventController.php';
include '../model/Event.php';


// Assurez-vous que l'ID de l'événement à éditer est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Créer une instance du contrôleur
    $eventController = new EventController();

    // Récupérer l'ID de l'événement à éditer
    $eventId = $_GET['id'];

    // Récupérer les détails de l'événement à éditer
    $eventDetails = $eventController->showEvent($eventId);

    if ($eventDetails) {
        // Vérifier si le formulaire de modification a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les nouvelles informations du formulaire
            $newNom = $_POST['nom'];
            $newLocalisation = $_POST['localisation'];
            $newDate = $_POST['date'];

            // Créer un nouvel objet Event avec les nouvelles informations
            $updatedEvent = new Event($eventId, $newNom, $newLocalisation, $newDate);

            // Mettre à jour l'événement en utilisant le contrôleur
            $eventController->updateEvent($updatedEvent, $eventId);

            // Rediriger vers la liste des événements après la mise à jour
            header('Location: listEvents.php');
        }
    } else {
        // Rediriger vers la liste des événements en cas d'ID invalide
        header('Location: listEvents.php');
    }
} else {
    // Rediriger vers la liste des événements en cas d'ID manquant
    header('Location: listEvents.php');
}

?>

<html lang="en">

<head>
     <meta charset="utf-8">
  <title>Artisanica | Reclamation </title>

 
  
  <!-- icon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  <link rel="stylesheet" href="css/boot.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <h2>Modifier un Événement</h2>

    <a href="listEvents.php">Retour à la liste des événements</a>
    <br><br>

    <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.html">
            <img src="images/logologo.jpg" alt="" width="250" height="220">
          </a>
          <h2 class="text-center">Modifier Evenement</h2>
          <form class="text-left clearfix" action="" method="POST">
            <div class="form-group">
            
                    <input class="form-control"  placeholder="Nom d'Event" type="text" id="nom" name="nom" value="<?php echo $eventDetails['nom']; ?>" />
                    <span id="erreurNom" style="color: red"></span>
             
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Localisation" type="text" id="localisation" name="localisation" value="<?php echo $eventDetails['localisation']; ?>" />
                <span id="erreurLocalisation" style="color: red"></span>
            </div>
            <div class="form-group">
              <input class="form-control"  placeholder="Date" type="date" id="date" name="date" value="<?php echo $eventDetails['date']; ?>" />
                    <span id="erreurDate" style="color: red"></span>
            </div>
            <div class="text-center">
              <input type="submit" class="btn btn-main text-center" value="Enregistrer">

            </div><br>
            <div class="text-center">
              <input type="reset" class="btn btn-main text-center" value="Réinitialiser">

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>