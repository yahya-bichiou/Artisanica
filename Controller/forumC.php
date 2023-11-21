<?php

require $_SERVER['DOCUMENT_ROOT'].'/Projet-Web/config.php';

class ForumC
{

    public function listForum()
    {
        $sql = "SELECT * FROM forum";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteForum($ide)
    {
        $sql = "DELETE FROM forum WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addForum($forum)
    {
        $sql = "INSERT INTO forum  
        VALUES (NULL, :txt_msg,:date_msg, :nom_msg,:idnw)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'txt_msg' => $forum->getText(),
                'date_msg' => $forum->getDate(),
                'nom_msg' => $forum->getNom(),
                'idnw' => $forum->getIdnw(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showForum($id)
    {
        $sql = "SELECT * from forum where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $forum = $query->fetch();
            return $forum;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateForum($forum, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE forum SET 
                    txt_msg = :txt_msg, 
                    date_msg = :date_msg, 
                    nom_msg = :nom_msg, 
                    idnw = :idnw
                WHERE id= :idForum'
            );
            
            $query->execute([
                'idForum' => $id,
                'txt_msg' => $forum->getText(),
                'date_msg' => $forum->getDate(),
                'nom_msg' => $forum->getNom(),
                'idnw' => $forum->getIdnw(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getForum($id)
    {
        $sql = "SELECT * FROM forum WHERE id = :id";
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
}
