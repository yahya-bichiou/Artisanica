<?php
include '../controller/categorieC.php';
$clientC = new categorieC();
$clientC->deleteCategorie($_GET["id_categorie"]);
header('Location:listcategorie.php');
