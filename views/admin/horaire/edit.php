<?php

use App\Connection;
use App\Model\Horaire;
use App\Table\HoraireTable;

$id = explode("/",$_SERVER["REQUEST_URI"])[3];
$pdo = Connection::getPDO();
$horaireTable = new HoraireTable($pdo);
$horaire = $horaireTable->find($id);
$success = false;

$errors = [];
if(!empty($_POST)){
  if(!empty($_POST['debutA'])){
    $horaire->setdebutA($_POST['debutA']);
  } else {
    $errors['debutA'][] = 'Champs horaire ouverture vide';
  }
  if (!empty($_POST['finA'])){
    $horaire->setfinA($_POST['finA']);
  } else {
    $errors['finA'][] = 'Champs fermeture vide';
  }
  if (!empty($_POST['debutB'])){
    $horaire->setDebutB($_POST['debutB']);
  } else { 
    $errors['debutB'][] = 'Champs ouverture vide';
  }
  if (!empty($_POST['finB'])){ 
    $horaire->setFinB($_POST['finB']);
  } else {
    $errors['finB'][] = ' Champs fermeture vide';
  }
  if (!empty($_POST['statut'])){ 
    $horaire->setStatut($_POST['statut']);
  } else {
    $errors['statut'][] = ' Champs statut vide';
  }

  if (empty($errors)){
    $horaireTable->update($horaire);
    $success = true;
  }
 

}
?>
<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/admin">ARTICLES</a></li>
        <li><a href="/admin/menu">MENUS</a></li>
        <li><a href="/admin/reservation">RÉSERVATIONS</a></li>
        <li><a href="/admin/horaire">HORAIRES</a></li>
        <li><a href="#contact">DECONNEXION</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4" style="margin-top: 100px;">
<a href="/admin/horaire" class="btn btn-primary" style="margin-left: -200px;">Page Précèdent</a>
<h1>Éditer les horaires <?= $horaire->getJour() ?></h1>
<?php if ($success): ?>
  <div class="alert alert-success">
    Les horaires ont bien été modifié
  </div>
<?php endif ?>
<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    Les horaires n'ont pas pu être modifié
  </div>
<?php endif ?>
<form action="" method="post">
  <div class="form-group">
    <label for="name"> DebutA</label>
    <input type="time" name="debutA" value="<?= $horaire->getdebutA()?>" class="form-control">
    <label for="name"> FinA</label>
    <input type="time" name="finA" value="<?= $horaire->getfinA()?>" class="form-control">
    <label for="name"> DebutB</label>
    <input type="time" name="debutB" value="<?= $horaire->getDebutB()?>" class="form-control">
    <label for="name"> FinB</label>
    <input type="time" name="finB" value="<?= $horaire->getFinB()?>" class="form-control">
    <label for="statut">Statut</label>
    <input type="text" id="statut" name="statut" value="<?= $horaire->getStatut()?>" class="form-control">
  </div>
  <button class="btn btn-primary">Modifier</button>
</form>

</div>