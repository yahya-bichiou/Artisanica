<?php
class News
{
    private ?int $idNews = null;
    private ?string $titre_nw = null;
    private ?string $date_nw = null;
    private ?string $image_nw = null;
    private ?string $text_nw = null;

    public function __construct($id = null, $n, $p, $a, $d)
    {
        $this->idNews = $id;
        $this->titre_nw = $n;
        $this->date_nw = $p;
        $this->image_nw = $a;
        $this->text_nw = $d;
    }


    public function getIdNews()
    {
        return $this->idNews;
    }


    public function getTitre()
    {
        return $this->titre_nw;
    }


    public function setTitre($titre_nw)
    {
        $this->titre_nw = $titre_nw;

        return $this;
    }


    public function getDate()
    {
        return $this->date_nw;
    }


    public function setDate($date_nw)
    {
        $this->date_nw = $date_nw;

        return $this;
    }


    public function getImage()
    {
        return $this->image_nw;
    }


    public function setImage($image_nw)
    {
        $this->image_nw = $image_nw;

        return $this;
    }


    public function getText()
    {
        return $this->text_nw;
    }


    public function setText($text_nw)
    {
        $this->text_nw = $text_nw;

        return $this;
    }
}
