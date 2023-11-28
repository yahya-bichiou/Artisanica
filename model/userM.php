<?php
class User
{
    private ?int $idUser = null;
    private ?string $nom_user = null;
    private ?string $prenom_user = null;
    private ?string $email_user = null;
    private ?string $mdp_user = null;
    private ?string $adresse_user = null;
    private ?string $tel_user = null;
    private ?string $cin_user = null;
    public function __construct($id = null, $n, $p, $a, $d, $r, $t, $c)
    {
        $this->idUser = $id;
        $this->nom_user = $n;
        $this->prenom_user = $p;
        $this->email_user = $a;
        $this->mdp_user = $d;
        $this->adresse_user = $r;
        $this->tel_user = $t;
        $this->cin_user = $c;
    }


    public function getIdUser()
    {
        return $this->idUser;
    }


    public function getNom()
    {
        return $this->nom_user;
    }


    public function setNom($nom_user)
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom_user;
    }


    public function setPrenom($prenom_user)
    {
        $this->prenom_user = $prenom_user;

        return $this;
    }

    public function getEmail()
    {
        return $this->email_user;
    }


    public function setEmail($email_user)
    {
        $this->email_user = $email_user;

        return $this;
    }


    public function getMdp()
    {
        return $this->mdp_user;
    }


    public function setMdp($mdp_user)
    {
        $this->mdp_user = $mdp_user;

        return $this;
    }


    public function getAdresse()
    {
        return $this->adresse_user;
    }


    public function setAdresse($adresse_user)
    {
        $this->adresse_user = $adresse_user;

        return $this;
    }

    public function getTel()
    {
        return $this->tel_user;
    }


    public function setTel($tel_user)
    {
        $this->cin_user = $cin_user;

        return $this;
    }
    public function getCin()
    {
        return $this->cin_user;
    }


    public function setCin($cin_user)
    {
        $this->cin_user = $cin_user;

        return $this;
    }
}
