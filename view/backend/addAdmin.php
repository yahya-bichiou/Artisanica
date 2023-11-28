<?php

include '../Controller/AdminC.php';
include '../model/Admin.php';

$error = "";

// create client
$admin = null;

// create an instance of the controller
$adminC = new AdminC();
if (
    isset($_POST["nom_adm"]) &&
    isset($_POST["prenom_adm"]) &&
    isset($_POST["email_adm"]) &&
    isset($_POST["mdp_adm"])
) {
    if (
        !empty($_POST['nom_adm']) &&
        !empty($_POST["prenom_adm"]) &&
        !empty($_POST["email_adm"]) &&
        !empty($_POST["mdp_adm"])
    ) {
        $admin = new Admin(
            null,
            $_POST['nom_adm'],
            $_POST['prenom_adm'],
            $_POST['email_adm'],
            $_POST['mdp_adm']
        );
        $adminC->addAdmin($admin);
        header('Location:../View/admins.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
</head>

<body>
    <a href="admins.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" class="form" id="form">
        <table>
            <tr>
                <td><label for="nom_adm">Nom :</label></td>
                <td>
                    <input type="text" id="nom_adm" name="nom_adm" />
                    <span id="erreurnom_adm" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prenom_adm">Prénom :</label></td>
                <td>
                    <input type="text" id="prenom_adm" name="prenom_adm" />
                    <span id="erreurprenom_adm" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email_adm">Email :</label></td>
                <td>
                    <input type="text" id="email_adm" name="email_adm" />
                    <span id="erreuremail_adm" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="mdp_adm">Mot de passe :</label></td>
                <td>
                    <input type="text" id="mdp_adm" name="mdp_adm" />
                    <span id="erreurmdp_adm" style="color: red"></span>
                </td>
            </tr>


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>
        <script src = "../View/control.js"></script>
    </form>
    
</body>

</html>