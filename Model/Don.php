<?php
class Don
{
    private ?int $idDon = null;
    private ?string $typeDon = null;
    private ?float $montant = null;
    private ?int $iduser = null; // Ajout du champ iduser

    public function __construct($idDon = null, $typeDon, $montant, $iduser = null)
    {
        $this->idDon = $idDon;
        $this->typeDon = $typeDon;
        $this->montant = $montant;
        $this->iduser = $iduser;
    }

    public function getIdDon()
    {
        return $this->idDon;
    }

    public function getTypeDon()
    {
        return $this->typeDon;
    }

    public function setTypeDon($typeDon)
    {
        $this->typeDon = $typeDon;
        return $this;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
        return $this;
    }
    public function getIdUser()
    {
        return $this->iduser;
    }

    public function setIdUser($iduser)
    {
        $this->iduser = $iduser;
        return $this;
    }
  
}

?>
