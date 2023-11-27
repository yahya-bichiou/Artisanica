<?php
class produit
{
    private ?int $id_produit = null;
    private ?string $nom_produit = null;
    private ?int $prix_produit = null;
    private ?int $nb_stock = null;
    private ?string $nom_image = null;
    private ?int $id_categorieP = null;

    public function __construct($id = null, $n, $p, $d,$i,$idCP)
    {
        $this->id_produit = $id;
        $this->nom_produit = $n;
        $this->prix_produit = $p;
        $this->nb_stock = $d;
        $this->nom_image = $i;
        $this->id_categorieP = $idCP;
    }


    public function getIdp()
    {
        return $this->id_produit;
    }


    public function getnomP()
    {
        return $this->nom_produit;
    }


    public function setnomP($nom_produit)
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }


    public function getprix()
    {
        return $this->prix_produit;
    }


    public function setprix($prix_produit)
    {
        $this->prix_produit = $prix_produit;

        return $this;
    }


    public function getnb()
    {
        return $this->nb_stock;
    }


    public function setnb($nb_stock)
    {
        $this->nb_stock = $nb_stock;

        return $this;
    }
    public function getni()
    {
        return $this->nom_image;
    }


    public function setni($nb_stock)
    {
        $this->nom_image = $nom_image;

        return $this;
    }
    public function getidCP()
    {
        return $this->id_categorieP;
    }


    public function setidCP($id_categorieP)
    {
        $this->id_categorieP = $id_categorieP;

        return $this;
    }

    
}
