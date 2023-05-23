<?php
namespace App\Table;

use App\Model\Image;
use PDO;

final class ImageTable extends Table {
    protected $table = "image";
    protected $class = Image::class;

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE id = ?");
        $exec = $query->execute([$id]);
        if($exec === false) {
            throw new \Exception("Impossible de supprimer l'image $id dans la table {$this->table}");
        }

    }

    public function update(Image $image): void {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET name = :name, url = :url, description = :description WHERE id = :id;");
        $exec =  $query->execute([
            "name" => $image->getName(),
            "url" => $image->getUrl(),
            "description" => $image->getDescription(),
            "id" => $image->getID()
          ]);
        if($exec === false) {
            throw new \Exception("Impossible de modifier l'image " .$image->getID(). "dans la table {$this->table}");
        }
    }

    public function create(Image $image): void {
        $name = $image->getName();
        $url = $image->getUrl();
        $description = $image->getDescription();
        $query = $this->pdo->prepare("INSERT INTO {$this->table} (name, url,description) VALUES  ('".$name."','".$url ."','" .$description ."');");
        $exec =  $query->execute([
            "name" => $name,
            "url" => $url,
            "description" => $description
          ]);
        if($exec === false) {
            throw new \Exception("Impossible de supprimer l'image dans la table {$this->table}");
        }
    }

    public function find(int $id){
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id;");
        $query->execute(array(
          "id" => $id, 
        ));
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if($result === false) {
            dd('table nOt FOund');
        }
        return $result;
    }



    public function getImages(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} LIMIT 3 ;");
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $results = $query->fetchAll();
        if($results === false) {
            dd('table nOt FOund');
        }
        return $results;

    }


}