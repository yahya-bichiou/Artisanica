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
        foreach ($_POST as $key => $value) {
        }
        $admin = new Admin(
            null,
            $_POST['nom_adm'],
            $_POST['prenom_adm'],
            $_POST['email_adm'],
            $_POST['mdp_adm']
        );
        var_dump($admin);
        
        $adminC->updateAdmin($admin, $_POST['idAdmin']);
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="admins.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idAdmin'])) {
        $admin = $adminC->showAdmin($_POST['idAdmin']);
        
    ?>

        <form action="" method="POST" id="form">
            <table>
            <tr>
                    <td><label for="nom_adm">IdAdmin :</label></td>
                    <td>
                        <input type="text" id="idAdmin" name="idAdmin" value="<?php echo $_POST['idAdmin'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_adm">Nom :</label></td>
                    <td>
                        <input type="text" id="nom_adm" name="nom_adm" value="<?php echo $admin['nom_adm'] ?>" />
                        <span id="erreurnom_adm" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom_adm">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom_adm" name="prenom_adm" value="<?php echo $admin['prenom_adm'] ?>" />
                        <span id="erreurprenom_adm" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email_adm">Email :</label></td>
                    <td>
                        <input type="text" id="email_adm" name="email_adm" value="<?php echo $admin['email_adm'] ?>" />
                        <span id="erreuremail_adm" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="mdp_adm">Mot de passe :</label></td>
                    <td>
                        <input type="text" id="mdp_adm" name="mdp_adm" value="<?php echo $admin['mdp_adm'] ?>" />
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
    <?php
    }
    ?>
</body>

</html>