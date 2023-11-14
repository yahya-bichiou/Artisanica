<?php

include '../Controller/EventController.php';
include '../model/Event.php';

$error = "";

// Créer un événement
$event = null;

// Créer une instance du contrôleur
$eventController = new EventController();

if (
    isset($_POST["nom"]) &&
    isset($_POST["localisation"]) &&
    isset($_POST["date"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["localisation"]) &&
        !empty($_POST["date"])
    ) {
        $event = new Event(
            null,
            $_POST['nom'],
            $_POST['localisation'],
            $_POST['date']
        );
        $eventController->addEvent($event);
        header('Location: listEvents.php');
        exit(); // Make sure to exit after redirect
    } else {
        $error = "Toutes les informations doivent être renseignées.";
    }
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

<body id="body">
    <a href="listEvents.php">Retour à la liste des événements</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
<div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.html">
            <img src="images/logologo.jpg" alt="" width="250" height="220">
          </a>
          <h2 class="text-center">Ajouter Reclamation</h2>
          <form class="text-left clearfix" action="">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="id-rec">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="date-rec">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="objet">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="texte" >
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center">Ajouter</button>
            </div><br>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center">Modifier</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="localisation">Localisation :</label></td>
                <td>
                    <input type="text" id="localisation" name="localisation" />
                    <span id="erreurLocalisation" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date">Date :</label></td>
                <td>
                    <input type="date" id="date" name="date" />
                    <span id="erreurDate" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Enregistrer">
                </td>
                <td>
                    <input type="reset" value="Réinitialiser">
                </td>
            </tr>
        </table>
    </form> -->
</body>

</html>
