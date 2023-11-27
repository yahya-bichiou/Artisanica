<?php
class categorie
{
    private ?int $id_categorie = null;
    private ?string $nom_categorie = null;
    private ?string $description = null;

    public function __construct($id = null, $n, $d)
    {
        $this->id_categorie = $id;
        $this->nom_categorie = $n;
        $this->description = $d;
    }


    public function getIdp()
    {
        return $this->id_categorie;
    }


    public function getnomC()
    {
        return $this->nom_categorie;
    }


    public function setnomC($nom_categorie)
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }


    public function getdes()
    {
        return $this->description;
    }


    public function setdes($description)
    {
        $this->description = $description;

        return $this;
    }


    

    
}
