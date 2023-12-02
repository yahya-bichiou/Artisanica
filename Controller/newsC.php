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
        VALUES (NULL, :titre_nw,:date_nw, :image_nw, :text_nw, :likes)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre_nw' => $news->getTitre(),
                'date_nw' => $news->getDate(),
                'image_nw' => $news->getImage(),
                'text_nw' => $news->getText(),
                'likes' => $news->getLikes(),
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
                    text_nw = :text_nw,
                    likes = :likes
                WHERE id= :idNews'
            );
            
            $query->execute([
                'idNews' => $id,
                'titre_nw' => $news->getTitre(),
                'date_nw' => $news->getDate(),
                'image_nw' => $news->getImage(),
                'text_nw' => $news->getText(),
                'likes' => $news->getLikes(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getNews($id)
    {
        $sql = "SELECT * FROM news WHERE id = :id";
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

    function likeNews($id)
    {
        $db = config::getConnexion();
        if (!$db) {
            die("Connection failed: " . $db->connect_error);
        }
    
        $stmt = $db->prepare("UPDATE news SET likes = likes + 1 WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    
        $stmt->close();
        $db->close();
    }



public function mostLikedPost()
{
    $sql = "SELECT id FROM news ORDER BY likes DESC LIMIT 1";
    $db = config::getConnexion();
    $req = $db->prepare($sql);

    try {
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);

        // Check if a post was found
        if ($result) {
            return $result['id'];
        } else {
            return null; // Return null if no post is found
        }
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

public function leastLikedPost()
{
    $sql = "SELECT id FROM news ORDER BY likes ASC LIMIT 1";
    $db = config::getConnexion();
    $req = $db->prepare($sql);

    try {
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);

        // Check if a post was found
        if ($result) {
            return $result['id'];
        } else {
            return null; // Return null if no post is found
        }
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

}
