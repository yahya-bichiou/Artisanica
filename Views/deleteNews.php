<?php
include '../Controller/newsC.php';
$clientC = new newsC();
$clientC->deletenews($_GET["id_nw"]);
header('Location:news.php');
