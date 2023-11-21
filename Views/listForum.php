<?php
include $_SERVER['DOCUMENT_ROOT'].'/Projet-Web/controller/forumC.php'; 

$c = new ForumC();
$tab = $c->listForum();

?>

    <?php
    foreach ($tab as $forum) {
    ?>




        <tr>
            <td><?= $forum['id']; ?></td>
            <td><?= $forum['txt_msg']; ?></td>
            <td><?= $forum['date_msg']; ?></td>
            <td><?= $forum['nom_msg']; ?></td>
            <td><?= $forum['idnw']; ?></td>
            <td align="center">
                <form method="POST" action="../updateForum.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $forum['id']; ?> name="idForum">
                </form>
            </td>
            <td>
                <a href="../deleteForum.php?id=<?php echo $forum['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>