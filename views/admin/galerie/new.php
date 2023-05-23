<?php

use App\Connection;
use App\Model\Image;
use App\Table\ImageTable;

$pdo = Connection::getPDO();
$imageTable = new ImageTable($pdo);
$image = new Image();
$success = false;

$errors = [];

if(!empty($_POST)){
  if(!empty($_POST['name'])){
    $image->setName($_POST['name']);
  } else {
    $errors['name'][] = 'Champs name vide';
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])){

    $target_dir = "/static/image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $image->setUrl($target_file);
    require 'upload.php';

  } else {
    $errors['url'][] = 'Champs url vide';
  }

  if (!empty($_POST['description'])){ 
    $image->setDescription($_POST['description']);
  } else {
    $errors['description'][] = ' Champs description vide';
  }
  if (empty($errors)){
    $imageTable->create($image);
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
<a href="/admin/image" class="btn btn-primary" style="margin-left: -200px;">Page Précèdent</a>
<h1>Créer une nouvelle image</h1>
<?php if ($success): ?>
  <div class="alert alert-success">
    L'image a bien été ajouté
  </div>
<?php endif ?>
<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    L'image n'a pas pu être créer
  </div>
<?php endif ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name"> Nom de L'image</label>
    <input type="text" name="name" value="<?= $image->getName()?>" class="form-control">
    <label for="name"> Url</label>
    <input type="file" name="image" accept="image/*" class="form-control">
    <label for="name"> Description</label>
    <input type="text" name="description" value="<?= $image->getDescription()?>" class="form-control">
  </div>
  <button class="btn btn-primary">Ajouter</button>
</form>

</div>

</div>

