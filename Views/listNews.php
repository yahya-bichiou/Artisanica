<?php
include $_SERVER['DOCUMENT_ROOT'].'/Projet-Web/controller/newsC.php'; 

$c = new NewsC();
$tab = $c->listNews();

?>

    <?php
    foreach ($tab as $news) {
    ?>




        <tr>
            <td><?= $news['id']; ?></td>
            <td><?= $news['titre_nw']; ?></td>
            <td><?= $news['date_nw']; ?></td>
            <td><?= $news['image_nw']; ?></td>
            <td><?= $news['text_nw']; ?></td>
            <td align="center">
                <form method="POST" action="../updateNews.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $news['id']; ?> name="idNews">
                </form>
            </td>
            <td>
                <a href="../deleteNews.php?id=<?php echo $news['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>