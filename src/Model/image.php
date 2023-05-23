<?php
namespace App\Model;

class Image {

    private $id;

    private $name;

    private $url;

    private $description;

    public function getID (): ?int
    {
        return $this->id;
    }

    public function getName (): ?string
    {
        return $this->name;
    }

    public function getUrl (): ?string
    {
        return $this->url;
    }

    public function getDescription (): ?string
    {
        return $this->description;
    }

    public function setID (int $i): self
    {
        $this->id = $i;
        return $this;
    }

    public function setName (string $n): self
    {
        $this->name = $n;
        return $this;
    }

    public function setUrl (string $c): self
    {
        $this->url = $c;
        return $this;
    }

    public function setDescription (string $d): self
    {
        $this->description = $d;
        return $this;
    }
}