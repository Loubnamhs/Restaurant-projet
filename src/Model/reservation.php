<?php
namespace App\Model;


class Reservation {

    private $id;

    private $UserID;

    private $heure;

    private $allergies;

    private $date;

    private $nombre_couverts;

    private $min;

    public function getId (): ?int
    {
        return $this->id;
    }

    public function getUserId (): ?int
    {
        return $this->UserID;
    }

    public function getHeure (): ?int
    {
        return $this->heure;
    }

    public function getDate (): ?string
    {
        return $this->date;
    }

    public function getAllergie (): ?string
    {
        return $this->allergies;
    }

    public function getNombreCouverts(): ?int
    {
        return $this->nombre_couverts;
    }

    public function getMin (): ?int
    {
        return $this->min;
    }


    public function setId (int $i): self
    {
        $this->id = $i;
        return $this;
    }

    public function setUserID (int $n): self
    {
        $this->UserID = $n;
        return $this;
    }

    public function setHeure (int $c): self
    {
        $this->heure = $c;
        return $this;
    }

    public function setDate (string $c): self
    {
        $this->date = $c;
        return $this;
    }

    public function setAllergie (string $d): self
    {
        $this->allergies = $d;
        return $this;
    }

    public function setNombreCouverts (int $p): self
    {
        $this->nombre_couverts = $p;
        return $this;
    }

    public function setMin (int $c): self
    {
        $this->min = $c;
        return $this;
    }

    



}