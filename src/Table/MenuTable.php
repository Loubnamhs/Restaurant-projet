<?php
namespace App\Table;

use App\Model\Menu;
use PDO;

final class MenuTable extends Table {
    protected $table = "Menus";
    protected $class = Menu::class;

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE id = ?");
        $exec = $query->execute([$id]);
        if($exec === false) {
            throw new \Exception("Impossible de supprimer l'Menu $id dans la table {$this->table}");
        }

    }

    public function update(Menu $menu): void {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET Nom = :name, Formule = :formule, prix = :prix, description = :description WHERE id = :id;");
        $exec =  $query->execute([
            "name" => $menu->getNom(),
            "formule" => $menu->getFormule(),
            "prix" => $menu->getPrix(),
            "description" => $menu->getdescription(),
            "id" => $menu->getId()
          ]);
        if($exec === false) {
            throw new \Exception("Impossible de modifier l'Menu " .$menu->getID(). "dans la table {$this->table}");
        }
    }

    public function create(Menu $menu): void {
        $name = $menu->getNom();
        $formule = $menu->getFormule();
        $prix = $menu->getPrix();
        $description = $menu->getdescription();
        $query = $this->pdo->prepare("INSERT INTO {$this->table} (Nom, Formule, prix, description) VALUES  ('".$name."','".$formule ."', ". $prix . ",'" .$description ."');");
        $exec =  $query->execute([
            "name" => $name,
            "formule" => $formule,
            "prix" => $prix,
            "description" => $description
          ]);
        if($exec === false) {
            throw new \Exception("Impossible de supprimer le Menu dans la table {$this->table}");
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


}