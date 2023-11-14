<?php
include "../Controller/newsC.php";

$c = new newsC();
$tab = $c->listnews();

?>
    <?php
    foreach ($tab as $news) {
    ?>
        <tr>
            <td><?= $news['id_nw']; ?></td>
            <td><?= $news['titre_nw']; ?></td>
            <td><?= $news['date_nw']; ?></td>
            <td><?= $news['image_nw']; ?></td>
            <td align="center">
                <form method="POST" action="updateNews.php">
                    <input type="submit" name="update" value="Modifier">
                    <input type="hidden" value=<?PHP echo $news['id_nw']; ?> name="idnews">
                </form>
            </td>
            <td>
                <a href="deletenews.php?id_nw=<?php echo $news['id_nw']; ?>">Supprimer</a>
            </td>
    </tr>
    <?php
    }
    ?>