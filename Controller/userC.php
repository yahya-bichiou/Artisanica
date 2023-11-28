<?php

require $_SERVER['DOCUMENT_ROOT'].'/PROJETWEB/config.php';

class UserC
{

    public function listUser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteUser($ide)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addUser($user)
    {
        $sql = "INSERT INTO user  
        VALUES (NULL, :nom_user,:prenom_user, :email_user,:mdp_user, :adresse_user, :tel_user , :cin_user)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_user' => $user->getNom(),
                'prenom_user' => $user->getPrenom(),
                'email_user' => $user->getEmail(),
                'mdp_user' => $user->getMdp(),
                'adresse_user' => $user->getAdresse(),
                'tel_user' => $user->getTel(),
                'cin_user' => $user->getCin(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showUser($id)
    {
        $sql = "SELECT * from user where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateUser($user, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    nom_user = :nom_user, 
                    prenom_user = :prenom_user, 
                    email_user = :email_user, 
                    mdp_user = :mdp_user,
                    adresse_user = :adresse_user,
                    tel_user = :tel_user,
                    cin_user = :cin_user
                WHERE id= :idUser'
            );
            
            $query->execute([
                'idUser' => $id,
                'nom_user' => $user->getNom(),
                'prenom_user' => $user->getPrenom(),
                'email_user' => $user->getEmail(),
                'mdp_user' => $user->getMdp(),
                'adresse_user' => $user->getAdresse(),
                'tel_user' => $user->getTel(),
                'cin_user' => $user->getCin(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM user WHERE email_user = :email";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':email', $email);
        
        try {
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function getUserByCin($cin) {
        $sql = "SELECT * FROM user WHERE cin_user = :cin";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':cin', $cin);
    
        try {
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

}
