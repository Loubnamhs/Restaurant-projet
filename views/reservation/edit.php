<?php

use App\Connection;
use App\Model\Reservation;
use App\Table\ReservationTable;

$id = explode("/",$_SERVER["REQUEST_URI"])[2];
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
  if (empty($errors)){
    $reservationTable->update($reservation);
    $success = true;
  }
 

}
?>
<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="/article">ARTICLES</a></li>
        <li><a href="/reservation">RESERVATIONS</a></li>
        <li><a href="#contact">DECONNEXION</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4" style="margin-top: 100px;">
<a href="/reservation" class="btn btn-primary" style="margin-left: -200px;">Page Précèdent</a>
<h1>Éditer la réservation du <?= $reservation->getDate() ?> | <?= $reservation->getHeure()?>:<?= $reservation->getMin()?></h1>
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
    <label for="name"> Allergies</label>
    <input type="text" name="allergies" value="<?= $reservation->getAllergie()?>" class="form-control">
    <label for="name"> Nombre de couverts</label>
    <input type="text" name="nombre_couverts" value="<?= $reservation->getNombreCouverts()?>" class="form-control"> 
  </div>
  <button class="btn btn-primary">Réserver</button>
</form>

</div>