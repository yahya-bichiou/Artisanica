<?php

class Event
{
    private ?int $idEvent = null;
    private ?string $nom = null;
    private ?string $localisation = null;
    private ?string $date = null;

    public function __construct($id = null, $n, $loc, $date)
    {
        $this->idEvent = $id;
        $this->nom = $n;
        $this->localisation = $loc;
        $this->date = $date;
    }

    public function getIdEvent()
    {
        return $this->idEvent;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getLocalisation()
    {
        return $this->localisation;
    }

    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
}
?>
