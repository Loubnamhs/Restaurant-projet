<?php
namespace App\Table;
use \PDO;

abstract class Table {

    protected $pdo;
    protected $table = null;
    protected $class = null;


    public function __construct(PDO $pdo){
        if($this->table === null) {
            throw new \Exception("La class " . get_class($this) . " n'a aucune propriété \$table");
        }
        if($this->class === null) {
            throw new \Exception("La class " . get_class($this) . " n'a aucune propriété \$class");
        }
        $this->pdo = $pdo;

    }

}

?>