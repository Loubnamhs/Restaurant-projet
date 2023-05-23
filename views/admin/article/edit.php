<?php

use App\Connection;
use App\Model\Article;
use App\Table\ArticleTable;

$id = explode("/",$_SERVER["REQUEST_URI"])[3];
$pdo = Connection::getPDO();
$articleTable = new ArticleTable($pdo);
$article = $articleTable->find($id);
$success = false;

$errors = [];
if(!empty($_POST)){
  if(!empty($_POST['name'])){
    $article->setNom_article($_POST['name']);
  } else {
    $errors['name'][] = 'Champs name vide';
  }
  if (!empty($_POST['categorie'])){
    $article->setCategorie($_POST['categorie']);
  } else {
    $errors['categorie'][] = 'Champs categorie vide';
  }
  if (!empty($_POST['prix'])){
    $article->setPrix($_POST['prix']);
  } else { 
    $errors['prix'][] = 'Champs prix vide';
  }
  if (!empty($_POST['descriptions'])){ 
    $article->setDescriptions($_POST['descriptions']);
  } else {
    $errors['descriptions'][] = ' Champs descriptions vide';
  }
  if (empty($errors)){
    $articleTable->update($article);
    $success = true;
  }
 

}
?>
<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="/admin">ARTICLES</a></li>
        <li><a href="/admin/menu">MENUS</a></li>
        <li><a href="/admin/reservation">RESERVATIONS</a></li>
        <li><a href="/admin/horaire">HORAIRES</a></li>
        <li><a href="#contact">DECONNEXION</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4" style="margin-top: 100px;">
<a href="/admin" class="btn btn-primary" style="margin-left: -200px;">Page Précèdent</a>
<h1>Éditer l'article <?= $article->getNom_article() ?></h1>
<?php if ($success): ?>
  <div class="alert alert-success">
    L'article a bien été modifié
  </div>
<?php endif ?>
<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    L'article n'a pas pu être modifié
  </div>
<?php endif ?>
<form action="" method="post">
  <div class="form-group">
    <label for="name"> Nom de L'article</label>
    <input type="text" name="name" value="<?= $article->getNom_article()?>" class="form-control">
    <label for="name"> Categorie</label>
    <input type="text" name="categorie" value="<?= $article->getCategorie()?>" class="form-control">
    <label for="name"> Prix</label>
    <input type="text" name="prix" value="<?= $article->getPrix()?>" class="form-control">
    <label for="name"> Descriptions</label>
    <input type="text" name="descriptions" value="<?= $article->getDescriptions()?>" class="form-control">
  </div>
  <button class="btn btn-primary">Modifier</button>
</form>

</div>