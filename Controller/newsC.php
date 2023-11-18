<?php

require $_SERVER['DOCUMENT_ROOT'].'/Projet-Web/config.php';

class NewsC
{

    public function listNews()
    {
        $sql = "SELECT * FROM news";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteNews($ide)
    {
        $sql = "DELETE FROM news WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addNews($news)
    {
        $sql = "INSERT INTO news  
        VALUES (NULL, :titre_nw,:date_nw, :image_nw,:text_nw)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre_nw' => $news->getTitre(),
                'date_nw' => $news->getDate(),
                'image_nw' => $news->getImage(),
                'text_nw' => $news->getText(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showNews($id)
    {
        $sql = "SELECT * from news where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $news = $query->fetch();
            return $news;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateNews($news, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE news SET 
                    titre_nw = :titre_nw, 
                    date_nw = :date_nw, 
                    image_nw = :image_nw, 
                    text_nw = :text_nw
                WHERE id= :idNews'
            );
            
            $query->execute([
                'idNews' => $id,
                'titre_nw' => $news->getTitre(),
                'date_nw' => $news->getDate(),
                'image_nw' => $news->getImage(),
                'text_nw' => $news->getText(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
