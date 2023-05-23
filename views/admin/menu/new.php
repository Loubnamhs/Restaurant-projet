<?php

use App\Connection;
use App\Model\Menu;
use App\Table\MenuTable;

$pdo = Connection::getPDO();
$menuTable = new MenuTable($pdo);
$menu = new Menu();
$success = false;

$errors = [];
if(!empty($_POST)){
  if(!empty($_POST['name'])){
    $menu->setNom($_POST['name']);
  } else {
    $errors['name'][] = 'Champs name vide';
  }
  if (!empty($_POST['formule'])){
    $menu->setFormule($_POST['formule']);
  } else {
    $errors['formule'][] = 'Champs formule vide';
  }
  if (!empty($_POST['prix'])){
    $menu->setPrix($_POST['prix']);
  } else { 
    $errors['prix'][] = 'Champs prix vide';
  }
  if (!empty($_POST['descriptions'])){ 
    $menu->setDescription($_POST['descriptions']);
  } else {
    $errors['descriptions'][] = ' Champs descriptions vide';
  }
  if (empty($errors)){
    $menuTable->create($menu);
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
<a href="/admin/menu" class="btn btn-primary" style="margin-left: -200px;">Page Précèdent</a>
<h1>Créer une nouvelle Menu</h1>
<?php if ($success): ?>
  <div class="alert alert-success">
    Le Menu a bien été ajouté
  </div>
<?php endif ?>
<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    Ld Menu n'a pas pu être créer
  </div>
<?php endif ?>
<form action="" method="post">
  <div class="form-group">
    <label for="name"> Nom du Menu</label>
    <input type="text" name="name" value="<?= $menu->getNom()?>" class="form-control">
    <label for="name"> Formule</label>
    <input type="text" name="formule" value="<?= $menu->getFormule()?>" class="form-control">
    <label for="name"> Prix</label>
    <input type="text" name="prix" value="<?= $menu->getPrix()?>" class="form-control">
    <label for="name"> Descriptions</label>
    <input type="text" name="descriptions" value="<?= $menu->getDescription()?>" class="form-control">
  </div>
  <button class="btn btn-primary">Ajouter</button>
</form>

</div>


</div>

