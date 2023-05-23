<?php
namespace App\Table;

use App\Model\Horaire;
use PDO;

final class HoraireTable extends Table {
    protected $table = "horaire";
    protected $class = Horaire::class;

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE id = ?");
        $exec = $query->execute([$id]);
        if($exec === false) {
            throw new \Exception("Impossible de supprimer l'Horaire $id dans la table {$this->table}");
        }

    }

    public function update(Horaire $horaire): void {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET debutA = :debutA, finA = :finA, debutB = :debutB, finB = :finB, statut = :statut, jour = :jour WHERE id = :id;");
        $exec =  $query->execute([
            "id" => $horaire->getID(),
            "debutA" => $horaire->getDebutA(),
            "finA" => $horaire->getfinA(),
            "debutB" => $horaire->getdebutB(),
            "finB" => $horaire->getfinB(),
            "statut" => $horaire->getstatut(),
            "jour" => $horaire->getjour()
          ]);
        if($exec === false) {
            throw new \Exception("Impossible de modifier l'Horaire " .$horaire->getId(). "dans la table {$this->table}");
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

    public function getHoraire(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} ;");
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $results = $query->fetchAll();
        if($results === false) {
            dd('table nOt FOund');
        }
        return $results;

    }


}