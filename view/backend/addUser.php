<?php

include $_SERVER['DOCUMENT_ROOT'].'/PROJETWEB/Controller/userC.php';
include $_SERVER['DOCUMENT_ROOT'].'/PROJETWEB/model/userM.php';

$error = "";

// create client
$user = null;

// create an instance of the controller
$userC = new UserC();
if (
    isset($_POST["nom_user"]) &&
    isset($_POST["prenom_user"]) &&
    isset($_POST["email_user"]) &&
    isset($_POST["mdp_user"]) &&
    isset($_POST["adresse_user"]) &&
    isset($_POST["tel_user"])&&
    isset($_POST["cin_user"])
) {
    if (
        !empty($_POST['nom_user']) &&
        !empty($_POST["prenom_user"]) &&
        !empty($_POST["email_user"]) &&
        !empty($_POST["mdp_user"]) &&
        !empty($_POST["adresse_user"]) &&
        !empty($_POST["tel_user"])&&
        !empty($_POST["cin_user"])

        
    ) {
        $user = new User(
            null,
            $_POST['nom_user'],
            $_POST['prenom_user'],
            $_POST['email_user'],
            $_POST['mdp_user'],
            $_POST['adresse_user'],
            $_POST['tel_user'],
            $_POST['cin_user']

        );
        $userC->addUser($user);
        header('Location:../View/frontend/login.html');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Artisanica | sign in</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <style>
            .logo{
              margin-bottom: -30px;
            }
          </style>
          <a class="logo" href="index.html">
            <img src="images/homelogo.png" alt="" height="100px">
          </a>
          <h2 class="text-center">Create Your Account</h2>
    <form action="" method="POST" id="userform">
        <table>
            <tr>
                <td><label for="nom_user">Nom :</label></td>
                <td>
                    <input type="text" id="nom_user" name="nom_user" />
                    <span id="erreurNom_user" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prenom_user">Prénom :</label></td>
                <td>
                    <input type="text" id="prenom_user" name="prenom_user" />
                    <span id="erreurPrenom_user" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email_user">Email :</label></td>
                <td>
                    <input type="text" id="email_user" name="email_user" />
                    <span id="erreurEmail_user" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="mdp_user">Mdp :</label></td>
                <td>
                    <input type="text" id="mdp_user" name="mdp_user" />
                    <span id="erreurMdp_user" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="adresse_user">Adresse :</label></td>
                <td>
                    <input type="text" id="adresse_user" name="adresse_user" />
                    <span id="erreurAdresse_user" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="tel_user">Tel :</label></td>
                <td>
                    <input type="int" id="tel_user" name="tel_user" />
                    <span id="erreurTel_user" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="cin_user">CIN :</label></td>
                <td>
                    <input type="int" id="cin_user" name="cin_user" />
                    <span id="erreurCin_user" style="color: red"></span>
                </td>
            </tr>


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>
        <script src = "../View/controluser.js"></script>
    </form>
    <p class="mt-20">Already have an account ?<a href="../view/frontend/login.html"> Login</a></p>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>