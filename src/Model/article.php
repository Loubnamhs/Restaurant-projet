<?php
namespace App\Model;

class Article {

    private $ArticleID;

    private $Nom_article;

    private $Descriptions;

    private $Prix;

    private $Categorie;

    public function getArticleID (): ?int
    {
        return $this->ArticleID;
    }

    public function getNom_article (): ?string
    {
        return $this->Nom_article;
    }

    public function getCategorie (): ?string
    {
        return $this->Categorie;
    }

    public function getDescriptions (): ?string
    {
        return $this->Descriptions;
    }

    public function getPrix (): ?float
    {
        return $this->Prix;
    }

    public function setArticleID (int $i): self
    {
        $this->ArticleID = $i;
        return $this;
    }

    public function setNom_article (string $n): self
    {
        $this->Nom_article = $n;
        return $this;
    }

    public function setCategorie (string $c): self
    {
        $this->Categorie = $c;
        return $this;
    }

    public function setDescriptions (string $d): self
    {
        $this->Descriptions = $d;
        return $this;
    }

    public function setPrix (float $p): self
    {
        $this->Prix = $p;
        return $this;
    }

    



}