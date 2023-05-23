<?php
namespace App\Model;

class Horaire {

    private $id;

    private $debutA;

    private $finA;

    private $debutB;

    private $finB;

    private $statut;

    private $jour;

    public function getID (): ?int
    {
        return $this->id;
    }

    public function getDebutA (): ?string
    {
        return $this->debutA;
    }

    public function getFinA(): ?string
    {
        return $this->finA;
    }

    public function getDebutB (): ?string
    {
        return $this->debutB;
    }

    public function getFinB (): ?string
    {
        return $this->finB;
    }

    public function getStatut (): ?bool
    {
        return $this->statut;
    }

    public function getJour (): ?string
    {
        return $this->jour;
    }

    public function setID (int $i): self
    {
        $this->id = $i;
        return $this;
    }

    public function setDebutA (string $n): self
    {
        $this->debutA = $n;
        return $this;
    }

    public function setFinA (string $c): self
    {
        $this->finA = $c;
        return $this;
    }

    public function setDebutB (string $d): self
    {
        $this->debutB = $d;
        return $this;
    }

    public function setFinB (string $p): self
    {
        $this->finB = $p;
        return $this;
    }

    public function setStatut (bool $p): self
    {
        $this->statut = $p;
        return $this;
    }

    public function setJour (string $p): self
    {
        $this->jour = $p;
        return $this;
    }

    



}