<?php

require '../config.php';

class categorieC
{

    public function listcategorie()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCategorie($ide)
    {
        $sql = "DELETE FROM categorie WHERE id_categorie = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addcategorie($categorie)
    {
        $sql = "INSERT INTO categorie  
        VALUES (NULL,:nom_categorie,:description)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_categorie' => $categorie->getnomC(),
                'description' => $categorie->getdes(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showCategorie($id)
    {
        $sql = "SELECT * from categorie where id_categorie = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $categorie = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCategorie($categorie, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    nom_categorie = :nom_categorie, 
                    description = :description 
                WHERE id_categorie= :id_categorie'
            );
            
            $query->execute([
                'id_categorie' => $id,
                'nom_categorie' => $categorie->getnomC(),
                'description' => $categorie->getdes(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
