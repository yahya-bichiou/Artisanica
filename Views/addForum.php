<?php
include $_SERVER['DOCUMENT_ROOT'].'/Projet-Web/Model/forumM.php';

$error = "";

// create client
$forum = null;

// create an instance of the controller
$forumC = new ForumC();
if (
    isset($_POST["text_msg"]) &&
    isset($_POST["nom_msg"])
) {
    if (
        !empty($_POST['text_msg']) &&
        !empty($_POST["nom_msg"])
    ) {
        // Set by default
        $idnw = 63;
        $todayDate = date('Y-m-d');

        $forum = new Forum(
            null,
            $_POST['text_msg'],
            $todayDate,
            $_POST['nom_msg'],
            $idnw
        );
        $forumC->addForum($forum);
    } else {
        $error = "Missing information";
    }
}
?>

<hr>

<div id="error">
    <?php echo $error; ?>
</div>

<form action="" method="POST" id="formForum">
    <table>
    <tr>
            <td><label for="nom_msg">Nom :</label></td>
            <td>
                <input type="text" id="nom_msg" name="nom_msg" />
                <span id="erreurNom_msg" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="text_msg">Text :</label></td>
            <td>
                <textarea type="text" id="text_msg" name="text_msg" wrap="soft" rows="4" cols="50"></textarea>
                <span id="erreurText_msg" style="color: red"></span>
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
<script src=""></script>
</div>
