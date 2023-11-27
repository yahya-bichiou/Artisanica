<?php

require '../config.php';

class produitC
{

    public function listproduits()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteProduit($ide)
    {
        $sql = "DELETE FROM produit WHERE id_produit = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addproduit($produit)
    {
        $sql = "INSERT INTO produit  
        VALUES (NULL,:nom_produit, :prix_produit,:nb_stock,:nom_image,:id_categorieP)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_produit' => $produit->getnomP(),
                'prix_produit' => $produit->getprix(),
                'nb_stock' => $produit->getnb(),
                'nom_image' => $produit->getni(),
                'id_categorieP' => $produit->getidCP(),

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showProduit($id)
    {
        $sql = "SELECT * from produit where id_produit = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateProduit($produit, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    nom_produit = :nom_produit, 
                    prix_produit = :prix_produit, 
                    nb_stock = :nb_stock, 
                    nom_image= :nom_image,
                    id_categorieP= :id_categorieP
                WHERE id_produit= :id_produit'
            );
            
            $query->execute([
                'id_produit' => $id,
                'nom_produit' => $produit->getnomP(),
                'prix_produit' => $produit->getprix(),
                'nb_stock' => $produit->getnb(),
                'nom_image' => $produit->getni(),
                'id_categorieP' => $produit->getidCP(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
