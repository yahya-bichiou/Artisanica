<?php
class News
{
    private ?int $idnews = null;
    private ?string $titre_nw = null;
    private ?string $date_nw = null;
    private ?string $image_nw = null;
    private ?string $tel = null;

    public function __construct($id_nw = null, $n, $p, $a)
    {
        $this->id_nw = $id_nw;
        $this->titre_nw = $n;
        $this->date_nw = $p;
        $this->image_nw = $a;
    }


    public function getIdnews()
    {
        return $this->id_nw;
    }


    public function gettitre_nw()
    {
        return $this->titre_nw;
    }


    public function settitre_nw($titre_nw)
    {
        $this->titre_nw = $titre_nw;

        return $this;
    }


    public function getdate_nw()
    {
        return $this->date_nw;
    }


    public function setdate_nw($date_nw)
    {
        $this->date_nw = $date_nw;

        return $this;
    }


    public function getimage_nw()
    {
        return $this->image_nw;
    }


    public function setimage_nw($image_nw)
    {
        $this->image_nw = $image_nw;

        return $this;
    }
}
