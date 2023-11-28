<?php
class Admin
{
    private ?int $id_adm = null;
    private ?string $nom_adm = null;
    private ?string $prenom_adm = null;
    private ?string $email_adm = null;
    private ?string $mdp_adm = null;

    public function __construct($id_adm = null, $n, $p, $a, $d)
    {
        $this->id_adm = $id_adm;
        $this->nom_adm = $n;
        $this->prenom_adm = $p;
        $this->email_adm = $a;
        $this->mdp_adm = $d;
    }


    public function getIdAdmin()
    {
        return $this->id_adm;
    }


    public function getnom_adm()
    {
        return $this->nom_adm;
    }


    public function setnom_adm($nom_adm)
    {
        $this->nom_adm = $nom_adm;

        return $this;
    }


    public function getPrenom_adm()
    {
        return $this->prenom_adm;
    }


    public function setPrenom_adm($prenom_adm)
    {
        $this->prenom_adm = $prenom_adm;

        return $this;
    }


    public function getemail_adm()
    {
        return $this->email_adm;
    }


    public function setemail_adm($email_adm)
    {
        $this->email_adm = $email_adm;

        return $this;
    }


    public function getmdp_adm()
    {
        return $this->mdp_adm;
    }


    public function setmdp_adm($mdp_adm)
    {
        $this->mdp_adm = $mdp_adm;

        return $this;
    }
}
