<?php
include $_SERVER['DOCUMENT_ROOT'].'/PROJETWEB/controller/userC.php'; 

$c = new UserC();
$tab = $c->listUser();

?>

    <?php
    foreach ($tab as $user) {
    ?>




        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['nom_user']; ?></td>
            <td><?= $user['prenom_user']; ?></td>
            <td><?= $user['email_user']; ?></td>
            <td><?= $user['mdp_user']; ?></td>
            <td><?= $user['adresse_user']; ?></td>
            <td><?= $user['tel_user']; ?></td>
            <td><?= $user['cin_user']; ?></td>
            <td align="center">
                <form method="POST" action="updateUser.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $user['id']; ?> name="idUser">
                </form>
            </td>
            <td>
                <a href="deleteUser.php?id=<?php echo $user['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>