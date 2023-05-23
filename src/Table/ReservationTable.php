<?php
namespace App\Table;

use App\Model\Reservation;
use PDO;

final class ReservationTable extends Table {
    protected $table = "Reservations";
    protected $class = Reservation::class;

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE id = ?");
        $exec = $query->execute([$id]);
        if($exec === false) {
            throw new \Exception("Impossible de supprimer l'Reservation $id dans la table {$this->table}");
        }

    }

    public function update(Reservation $Reservation): void {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET UserID = :userid, heure = :heure, allergies = :allergies, nombre_couverts = :nombre_couverts, date = :date, min = :min WHERE id = :id;");
        $exec =  $query->execute([
            "userid" => $Reservation->getUserId(),
            "heure" => $Reservation->getHeure(),
            "allergies" => $Reservation->getAllergie(),
            "nombre_couverts" => $Reservation->getNombreCouverts(),
            "date" => $Reservation->getDate(),
            "min" => $Reservation->getMin(),
            "id" => $Reservation->getID()
          ]);
        if($exec === false) {
            throw new \Exception("Impossible de modifier l'Reservation " .$Reservation->getId(). "dans la table {$this->table}");
        }
    }

    public function create(Reservation $Reservation): void {
        $userid = $Reservation->getUserId();
        $heure = $Reservation->getHeure();
        $nombre_couverts = $Reservation->getNombreCouverts();
        $allergies = $Reservation->getAllergie();
        $date = $Reservation->getDate();
        $min = $Reservation->getMin();
        $query = $this->pdo->prepare("INSERT INTO {$this->table} (UserID, heure, allergies, nombre_couverts, date, min) VALUES (". $userid .", ". $heure .", '". $allergies ."', " .$nombre_couverts .", '" .$date ."', ".$min.");");
        $exec =  $query->execute([
            "userid" => $userid,
            "heure" => $heure,
            "allergies" => $allergies,
            "nombre_couverts" => $nombre_couverts,
            "date" => $date,
            "min" => $min
          ]);
        if($exec === false) {
            throw new \Exception("Impossible de supprimer l'Reservation dans la table {$this->table}");
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

    public function getReservation(): array
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

    public function getReservationByDate(string $date){
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE `date` = :date ;");
        $query->execute(array(
          "date" => $date, 
        ));
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetchAll();
        if($result === false) {
            dd('table nOt FOund');
        }
        return $result;
    }


}