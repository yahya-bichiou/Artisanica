<?php

include '../Controller/newsC.php';
include '../Model/news.php';

$error = "";

// create client
$news = null;

// create an instance of the controller
$newsC = new NewsC();
if (
    isset($_POST["titre_nw"]) &&
    isset($_POST["date_nw"]) &&
    isset($_POST["image_nw"])
) {
    if (
        !empty($_POST['titre_nw']) &&
        !empty($_POST["date_nw"]) &&
        !empty($_POST["image_nw"])
    ) {
        $news = new News(
            null,
            $_POST['titre_nw'],
            $_POST['date_nw'],
            $_POST['image_nw'],
        );
        $newsC->addnews($news);
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>news </title>
</head>

<body>
    <a href="news.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="titre_nw">Titre :</label></td>
                <td>
                    <input type="text" id="titre_nw" name="titre_nw" />
                    <span id="erreurtitre_nw" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date_nw">Date :</label></td>
                <td>
                    <input type="date" id="date_nw" name="date_nw" />
                    <span id="erreurdate_nw" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="image_nw">Image :</label></td>
                <td>
                    <input type="text" id="image_nw" name="image_nw" />
                    <span id="erreurimage_nw" style="color: red"></span>
                </td>
            </tr>
            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
</body>

</html>