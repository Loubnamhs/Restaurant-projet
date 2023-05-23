<?php

use App\Connection;
use App\Model\Reservation;
use App\Table\ReservationTable;

$id = explode("/",$_SERVER["REQUEST_URI"])[3];
$pdo = Connection::getPDO();
$reservationTable = new ReservationTable($pdo);
$reservation = $reservationTable->find($id);
$success = false;

$errors = [];
if(!empty($_POST)){
  if(!empty($_POST['userid'])){
    $reservation->setUserID($_POST['userid']);
  } else {
    $errors['userid'][] = 'Champs userid vide';
  }
  if (!empty($_POST['heure'])){
    $reservation->setHeure($_POST['heure']);
  } else {
    $errors['heure'][] = 'Champs heure vide';
  }
  if (!empty($_POST['allergies'])){
    $reservation->setAllergie($_POST['allergies']);
  } else { 
    $errors['allergies'][] = 'Champs allergies vide';
  }
  if (!empty($_POST['nombre_couverts'])){ 
    $reservation->setNombreCouverts($_POST['nombre_couverts']);
  } else {
    $errors['nombre_couverts'][] = ' Champs nombre_couverts vide';
  }
  if (!empty($_POST['date'])){ 
    $reservation->setDate($_POST['date']);
  } else {
    $errors['date'][] = ' Champs date vide';
  }
  if (!empty($_POST['min'])){ 
    $reservation->setMin($_POST['min']);
  } else {
    $errors['min'][] = ' Champs date vide';
  }
  if (empty($errors)){
    $reservationTable->update($reservation);
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
<h1>Éditer la réservation <?= $reservation->getUserId() ?></h1>
<?php if ($success): ?>
  <div class="alert alert-success">
    Le réservation a bien été modifié
  </div>
<?php endif ?>
<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    La réservation n'a pas pu être modifié
  </div>
<?php endif ?>
<form action="" method="post">
  <div class="form-group">
    <label for="name"> UserID</label>
    <input type="text" name="userid" value="<?= $reservation->getUserId()?>" class="form-control">
    <label for="name"> Heure</label>
    <input type="text" name="heure" value="<?= $reservation->getHeure()?>" class="form-control">
    <label for="name"> Prix</label>
    <input type="text" name="allergies" value="<?= $reservation->getAllergie()?>" class="form-control">
    <label for="name"> Descriptions</label>
    <input type="text" name="nombre_couverts" value="<?= $reservation->getNombreCouverts()?>" class="form-control">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" value="<?= $reservation->getDate()?>"class="form-control">
    <label for="date">Minute:</label>
    <input type="text" id="min" name="min" value="<?= $reservation->getMin()?>"class="form-control">
  </div>
  <button class="btn btn-primary">Modifier</button>
</form>

</div>