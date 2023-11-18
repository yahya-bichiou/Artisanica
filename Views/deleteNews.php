<?php
include $_SERVER['DOCUMENT_ROOT'].'/Projet-Web/Controller/NewsC.php';
$clientC = new NewsC();
$clientC->deleteNews($_GET["id"]);
header('Location:../View/back/news.php');
