<?php
include $_SERVER['DOCUMENT_ROOT'].'/Projet-Web/Controller/ForumC.php';
$clientC = new ForumC();
$clientC->deleteForum($_GET["id"]);

header('Location:../View/back/forum.php');
?>
