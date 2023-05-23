<?php
namespace App\Table;

use App\Model\Article;
use PDO;

final class ArticleTable extends Table {
    protected $table = "articles";
    protected $class = Article::class;

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE ArticleID = ?");
        $exec = $query->execute([$id]);
        if($exec === false) {
            throw new \Exception("Impossible de supprimer l'article $id dans la table {$this->table}");
        }

    }

    public function update(Article $article): void {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET Nom_article = :name, Categorie = :categorie, Prix = :prix, Descriptions = :description WHERE ArticleID = :id;");
        $exec =  $query->execute([
            "name" => $article->getNom_article(),
            "categorie" => $article->getCategorie(),
            "prix" => $article->getPrix(),
            "description" => $article->getDescriptions(),
            "id" => $article->getArticleID()
          ]);
        if($exec === false) {
            throw new \Exception("Impossible de modifier l'article " .$article->getArticleID(). "dans la table {$this->table}");
        }
    }

    public function create(Article $article): void {
        $name = $article->getNom_article();
        $categorie = $article->getCategorie();
        $prix = $article->getPrix();
        $description = $article->getDescriptions();
        $query = $this->pdo->prepare("INSERT INTO {$this->table} (Nom_article, Categorie, Prix, Descriptions) VALUES  ('".$name."','".$categorie ."', ". $prix . ",'" .$description ."');");
        $exec =  $query->execute([
            "name" => $name,
            "categorie" => $categorie,
            "prix" => $prix,
            "description" => $description
          ]);
        if($exec === false) {
            throw new \Exception("Impossible de supprimer l'article dans la table {$this->table}");
        }
    }

    public function find(int $id){
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE ArticleID = :id;");
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



    public function getCategories(): array 
    { 
        $query = $this->pdo->prepare("SELECT `Categorie` FROM articles GROUP BY `Categorie`;");
        $query->setFetchMode(PDO::FETCH_OBJ);
        $query->execute();

        $results = $query->fetchAll();
        if($results === false) {
            dd('table nOt FOund');
        }
        return $results;

    }

    public function getArticleByCategorie(string $categorie): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE `Categorie` = :categorie;");
        $query->execute(array(
          "categorie" => $categorie, 
        ));
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $results = $query->fetchAll();
        if($results === false) {
            dd('table nOt FOund');
        }
        return $results;

    }


}