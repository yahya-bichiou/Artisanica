<?php
class Forum
{
    private ?int $idForum = null;
    private ?string $text_msg = null;
    private ?string $date_msg = null;
    private ?string $nom_msg = null;
    private ?int $idnw = null;

    public function __construct($id = null, $n, $p, $a, $d)
    {
        $this->idForum = $id;
        $this->text_msg = $n;
        $this->date_msg = $p;
        $this->nom_msg = $a;
        $this->idnw = $d;
    }


    public function getIdForum()
    {
        return $this->idForum;
    }


    public function getText()
    {
        return $this->text_msg;
    }


    public function setText($text_msg)
    {
        $this->text_msg = $text_msg;

        return $this;
    }


    public function getDate()
    {
        return $this->date_msg;
    }


    public function setDate($date_msg)
    {
        $this->date_msg = $date_msg;

        return $this;
    }


    public function getNom()
    {
        return $this->nom_msg;
    }


    public function setNom($nom_msg)
    {
        $this->nom_msg = $nom_msg;

        return $this;
    }


    public function getIdnw()
    {
        return $this->idnw;
    }


    public function setIdnw($idnw)
    {
        $this->idnw = $idnw;

        return $this;
    }
}
