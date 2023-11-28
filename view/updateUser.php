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
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
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
        var_dump($user);
        
        $userC->updateUser($user, $_POST['idUser']);
        header('Location:../View/users.php');
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
    <button><a href="users.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idUser'])) {
        $user = $userC->showUser($_POST['idUser']);
        
    ?>

        <form action="" method="POST" id="userform">
            <table>
            <tr>
                    <td><label for="nom_user">idUser :</label></td>
                    <td>
                        <input type="text" id="idUser" name="idUser" value="<?php echo $_POST['idUser'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_user">Nom :</label></td>
                    <td>
                        <input type="text" id="nom_user" name="nom_user" value="<?php echo $user['nom_user'] ?>" />
                        <span id="erreurNom_user" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom_user">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom_user" name="prenom_user" value="<?php echo $user['prenom_user'] ?>" />
                        <span id="erreurPrenom_user" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email_user">Email :</label></td>
                    <td>
                        <input type="text" id="email_user" name="email_user" value="<?php echo $user['email_user'] ?>" />
                        <span id="erreurEmail_user" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="mdp_user">Mot de passe :</label></td>
                    <td>
                        <input type="text" id="mdp_user" name="mdp_user" value="<?php echo $user['mdp_user'] ?>" />
                        <span id="erreurMdp_user" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="adresse_user">Adresse :</label></td>
                    <td>
                        <input type="text" id="adresse_user" name="adresse_user" value="<?php echo $user['adresse_user'] ?>" />
                        <span id="erreurAdresse_user" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="tel_user">Tel :</label></td>
                    <td>
                        <input type="text" id="tel_user" name="tel_user" value="<?php echo $user['tel_user'] ?>" />
                        <span id="erreurTel_user" style="color: red"></span>
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
    <?php
    }
    ?>
</body>

</html>