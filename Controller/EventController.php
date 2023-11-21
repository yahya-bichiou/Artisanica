<?php

require '../../config.php'; // Assurez-vous que le chemin vers le fichier de configuration est correct

class EventController
{

    public function listEvents()
    {
        $sql = "SELECT * FROM events";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteEvent($eventId)
    {
        $sql = "DELETE FROM events WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $eventId);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEvent($event)
    {
        $nom = $event->getNom();
        $localisation = $event->getLocalisation();
        $date = $event->getDate();
    
        // Validation des données
        if (empty($nom) || empty($localisation) || empty($date)) {
            echo "Tous les champs doivent être renseignés.";
            return;
        }
    
        // Vous pouvez ajouter d'autres validations ici (par exemple, format de date)
    
       
        
        // Effectue l'insertion dans la base de données
        $sql = "INSERT INTO events (nom, localisation, date) VALUES (:nom, :localisation, :date)";
        
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':localisation', $localisation);
            $query->bindParam(':date', $date);
            $query->execute();
            echo "L'événement a été ajouté avec succès.";
        } catch (Exception $e) {
            echo 'Erreur lors de l\'ajout de l\'événement : ' . $e->getMessage();
        }
    }
    



    function showEvent($id)
    {
        $sql = "SELECT * FROM events WHERE id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateEvent($event, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE events SET 
                    nom = :nom, 
                    localisation = :localisation, 
                    date = :date
                WHERE id= :idEvent'
            );

            $query->execute([
                'idEvent' => $id,
                'nom' => $event->getNom(),
                'localisation' => $event->getLocalisation(),
                'date' => $event->getDate(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
