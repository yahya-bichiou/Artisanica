<?php

require '../../config.php'; // Assurez-vous que le chemin vers le fichier de configuration est correct

class DonController
{

    public function listeDons()
    {
        $sql = "SELECT * FROM dons";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deletedonations($DonsId)
    {
        $sql = "DELETE FROM dons WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $DonsId);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

     public function addDons($Dons,$iduser)
    {
        $typeDon= $Dons->getTypeDon();
        $montant = $Dons->getMontant();
        
    
        // Validation des données
        if (empty($typeDon) || empty($montant)) {
            echo "Tous les champs doivent être renseignés.";
            return;
        }
    
        // V
        
        // Effectue l'insertion dans la base de données
        $sql = "INSERT INTO dons (typedon, montant,iduser) VALUES (:typedon, :montant, :iduser)";
        
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':typedon', $typeDon);
            $query->bindParam(':montant',   $montant );
            $query->bindParam(':iduser',   $iduser );
            $query->execute();
            
            
            echo "L'Dons a été ajouté avec succès.";
        } catch (Exception $e) {
            echo 'Erreur lors de l\'ajout de l\'Dons : ' . $e->getMessage();
        }
    }
    



    public function getdon($id)
    {
        $sql = "SELECT * FROM dons WHERE id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $don = $query->fetch();
            return $don;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateDon($don, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE dons SET 
                    typedon = :typedon, 
                    montant = :montant
                WHERE id= :idDon'
            );

            $query->execute([
                'idDon' => $id,
                'typedon' => $don->getTypeDon(),
                'montant' => $don->getMontant()
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getUserNameById($idUser)
    {
        // Ici, vous devrez interroger votre source de données (base de données, par exemple)
        // pour obtenir le nom de l'utilisateur en fonction de son ID.
        // Assurez-vous d'adapter cette fonction à votre système de stockage de données.

        // Exemple fictif (utilisation de tableaux associatifs pour simuler une base de données)
        $users = [
            1 => 'Admin',
            2 => 'Mariem',
            // ... d'autres utilisateurs
        ];

        // Vérifier si l'ID d'utilisateur existe dans le tableau
        if (isset($users[$idUser])) {
            return $users[$idUser];
        } else {
            return 'Utilisateur inconnu';
        }
    }
}
?>
