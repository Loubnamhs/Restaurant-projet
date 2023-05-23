<?php
namespace App\Model;

class Menu {

    private $id;

    private $Nom;

    private $Formule;

    private $description;

    private $prix;

    public function getId (): ?int
    {
        return $this->id;
    }

    public function getNom (): ?string
    {
        return $this->Nom;
    }

    public function getFormule (): ?string
    {
        return $this->Formule;
    }

    public function getDescription (): ?string
    {
        return $this->description;
    }

    public function getPrix (): ?float
    {
        return $this->prix;
    }


    public function setId (int $i): self
    {
        $this->id = $i;
        return $this;
    }

    public function setNom (string $n): self
    {
        $this->Nom = $n;
        return $this;
    }

    public function setFormule (string $c): self
    {
        $this->Formule = $c;
        return $this;
    }

    public function setDescription (string $d): self
    {
        $this->description = $d;
        return $this;
    }

    public function setPrix (float $p): self
    {
        $this->prix = $p;
        return $this;
    }

    



}