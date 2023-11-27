<?php
include '../controller/produitC.php';
$clientC = new produitC();
$clientC->deleteProduit($_GET["id_produit"]);
header('Location:listproduits.php');
