<?php

require '../config.php';

class NewsC
{

    public function listnews()
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

    function deletenews($ide_nw)
    {
        $sql = "DELETE FROM news WHERE id_nw = :id_nw";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_nw', $ide_nw);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addnews($news)
    {
        $sql = "INSERT INTO news
        VALUES (NULL, :titre_nw,:date_nw, :image_nw)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre_nw' => $news->gettitre_nw(),
                'date_nw' => $news->getdate_nw(),
                'image_nw' => $news->getimage_nw(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function shownews($id_nw)
    {
        $sql = "SELECT * from news where id_nw = $id_nw";
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

    function updateNews($news, $id_nw)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE news SET 
                    titre_nw = :titre_nw, 
                    date_nw = :date_nw, 
                    image_nw = :image_nw, 
                WHERE id_nw= :idnews'
            );
            
            $query->execute([
                'idnews' => $id_nw,
                'titre_nw' => $news->gettitre_nw(),
                'date_nw' => $news->getdate_nw(),
                'image_nw' => $news->getimage_nw(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
