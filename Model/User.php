<?php
class User
{
    private ?int $idUser = null;
    private ?string $username = null;

    public function __construct($id = null, $username)
    {
        $this->idUser = $id;
        $this->username = $username;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
}
?>

