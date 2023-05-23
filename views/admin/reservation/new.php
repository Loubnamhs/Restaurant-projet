<?php

use App\Connection;
use App\Model\Reservation;
use App\Table\ReservationTable;

$pdo = Connection::getPDO();
$ReservationTable = new ReservationTable($pdo);
$Reservation = new Reservation();
$success = false;

$errors = [];
if(!empty($_POST)){
  if(!empty($_POST['UserID'])){
    $Reservation->setUserID($_POST['UserID']);
  } else {
    $errors['name'][] = 'Champs UserID vide';
  }
  if (!empty($_POST['heure'])){
    $Reservation->setHeure($_POST['heure']);
  } else {
    $errors['heure'][] = 'Champs heure vide';
  }
  if (!empty($_POST['allergies'])){
    $Reservation->setAllergie($_POST['allergies']);
  } else { 
    $errors['allergies'][] = 'Champs allergies vide';
  }
  if (!empty($_POST['nombre_couverts'])){ 
    $Reservation->setNombreCouverts($_POST['nombre_couverts']);
  } else {
    $errors['nombre_couverts'][] = ' Champs nombre_couverts vide';
  }
  if (!empty($_POST['date'])){ 
    $Reservation->setDate($_POST['date']);
  } else {
    $errors['date'][] = ' Champs date vide';
  }
  if (!empty($_POST['min'])){ 
    $Reservation->setMin($_POST['min']);
  } else {
    $errors['min'][] = ' Champs date vide';
  }
  if (empty($errors)){
    $ReservationTable->create($Reservation);
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
<a href="/admin/reservation" class="btn btn-primary" style="margin-left: -200px;">Page Précèdent</a>
<h1>Créer une nouvelle réservation</h1>
<?php if ($success): ?>
  <div class="alert alert-success">
    Le réservation a bien été ajouté
  </div>
<?php endif ?>
<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    La réservation n'a pas pu être créer
  </div>
<?php endif ?>
<form action="" method="post">
  <div class="form-group">
    <label for="name"> UserID</label>
    <input type="text" name="UserID" value="<?= $Reservation->getUserId()?>" class="form-control">
    <label for="name"> Heure</label>
    <input type="text" name="heure" value="<?= $Reservation->getHeure()?>" class="form-control">
    <label for="name"> Allergies</label>
    <input type="text" name="allergies" value="<?= $Reservation->getAllergie()?>" class="form-control">
    <label for="name"> Nombre de couverts</label>
    <input type="text" name="nombre_couverts" value="<?= $Reservation->getNombreCouverts()?>" class="form-control">
    <label for="date">Date </label>
    <input type="date" id="date" name="date" value="<?= $Reservation->getDate()?>" class="form-control">
    <label for="min">Minute:</label>
    <input type="text" id="min" name="min" value="<?= $Reservation->getMin()?>"class="form-control">
  </div>
  <button class="btn btn-primary">Ajouter</button>
</form>

</div>


</div>

