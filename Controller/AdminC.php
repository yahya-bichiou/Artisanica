<?php

require '../config.php';

class AdminC
{

    public function listAdmins()
    {
        $sql = "SELECT * FROM admin";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteAdmin($ide)
    {
        $sql = "DELETE FROM admin WHERE id_adm = :id_adm";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_adm', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    
    function addAdmin($admin)
    {
        $sql = "INSERT INTO admin  
        VALUES (NULL, :nom_adm,:prenom_adm, :email_adm,:mdp_adm)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_adm' => $admin->getnom_adm(),
                'prenom_adm' => $admin->getprenom_adm(),
                'email_adm' => $admin->getemail_adm(),
                'mdp_adm' => $admin->getmdp_adm(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showAdmin($id_adm)
    {
        $sql = "SELECT * from admin where id_adm = $id_adm";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $admin = $query->fetch();
            return $admin;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateAdmin($admin, $id_adm)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE admin SET 
                    nom_adm = :nom_adm, 
                    prenom_adm = :prenom_adm, 
                    email_adm = :email_adm, 
                    mdp_adm = :mdp_adm
                WHERE id_adm= :id_adm'
            );
            
            $query->execute([
                'id_adm' => $id_adm,
                'nom_adm' => $admin->getnom_adm(),
                'prenom_adm' => $admin->getprenom_adm(),
                'email_adm' => $admin->getemail_adm(),
                'mdp_adm' => $admin->getmdp_adm(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
