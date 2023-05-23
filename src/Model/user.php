<?php
namespace App\Model;

class User {

    private $userID;

    private $nom;

    private $prenom;

    private $email;

    private $mot_de_passe;

    private $allergies;

    private $convives;

    public function getUserID (): ?int
    {
        return $this->userID;
    }

    public function getNom (): ?string
    {
        return $this->nom;
    }

    public function getPrenom (): ?string
    {
        return $this->prenom;
    }

    public function getEmail (): ?string
    {
        return $this->email;
    }

    public function getMot_de_passe (): ?string
    {
        return $this->mot_de_passe;
    }

    public function getAllergies (): ?string
    {
        return $this->allergies;
    }

    public function getConvives (): ?int
    {
        return $this->convives;
    }
    

    public function setUserID (int $userID)
    {
       $this->userID = $userID;
    }

    public function setNom (string $nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom (string $prenom)
    {
        $this->prenom = $prenom ;
    }

    public function setEmail (string $email)
    {
        $this->email = $email;
    }

    public function setMot_de_passe (string $mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }

    public function setAllergies (string $allergies)
    {
        $this->allergies = $allergies;
    }

    public function setConvives (int $convives)
    {
        $this->convives = $convives;
    }
    
}