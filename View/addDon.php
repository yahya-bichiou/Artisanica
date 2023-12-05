<?php

include '../../Controller/DonController.php';
include '../../model/Don.php';

$error = "";

// Créer un événement
$Don = null;

// Créer une instance du contrôleur
$DonsController = new DonController();

if (
    isset($_POST["iduser"]) &&
    isset($_POST["type"]) &&
    isset($_POST["montant"]) 
   
) {
    if (
        !empty($_POST["iduser"]) &&
        !empty($_POST['type']) &&
        !empty($_POST["montant"]) 
       
    ) {
      $idUser =$_POST['iduser'];

        $Don = new Don(
            null,
            $_POST['type'],
            $_POST['montant'],
            $idUser
           
        );
        $DonsController->addDons($Don,$idUser);
        header('Location: listDons.php');
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
  <script>
   function validateForm() {
    var type = document.getElementById("type").value;
    var montant = document.getElementById("montant").value;

    var erreurType = document.getElementById("erreurType");
    var erreurMontant = document.getElementById("erreurMontant");

    // Réinitialiser les messages d'erreur
    erreurType.innerHTML = "";
    erreurMontant.innerHTML = "";

    var isValid = true;
   
    
    // Valider le champ de type
    if (!/^[a-zA-Z]+$/.test(type)) {
    erreurType.innerHTML = "Le champ Type de don doit contenir uniquement des lettres.";
    isValid = false;
}

    // Valider le champ de montant
    if (montant.trim() === "" || isNaN(montant) || parseFloat(montant) < 100) {
        erreurMontant.innerHTML = "Le champ Montant doit être un nombre supérieur ou égal à 100.";
        isValid = false;
    } 
    

  // valider les champs 
    

    // Désactiver le bouton si la validation échoue pour le champ de type
    document.getElementById("submitBtn").disabled = !isValid;

    return isValid;
}


    // Attacher la fonction de validation au formulaire
    document.getElementById("myForm").addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Empêcher la soumission du formulaire si la validation échoue
        }
    });

</script>





</head>

<body id="body">
    <a href="listDons.php">Retour à la liste des Dons</a>
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
          <h2 class="text-center">Ajouter Dons</h2>
          <form class="text-left clearfix" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm">
          <div class="form-group">
            
                    <input class="form-control"  placeholder="Ton Id" type="text" id="iduser" name="iduser" />
             
            </div> 
          <div class="form-group">
            
                    <input class="form-control"  placeholder="Type de don" type="text" id="type" name="type" oninput="validateForm()" />
                    <span id="erreurType" style="color: red"></span>
             
            </div>
            <div class="form-group">
            <input class="form-control" placeholder="Montant" type="number" id="montant" name="montant" oninput="validateForm()" />
              <span id="erreurMontant" style="color: red"></span>
            </div>
            <div class="form-group">
             
                    <span id="erreurDate" style="color: red"></span>
            </div>
            <div class="text-center">
            <input type="submit" class="btn btn-main text-center" value="Enregistrer" id="submitBtn"  >

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
