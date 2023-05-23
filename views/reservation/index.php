<?php

use App\Authentication;
use App\Connection;
use App\Helpers\text;
use App\Model\Reservation;
use App\Table\HoraireTable;
use App\Table\ReservationTable;

function timeToMin(string $timeString): string
{
  $timeParts = explode(":", $timeString);
  $hours = intval($timeParts[0]);
  $minutes = intval($timeParts[1]);
  
  $totalMin = ($hours * 60) + $minutes;
  return $totalMin;
}


Authentication::check();

$title = "reservation";
$pdo = Connection::getPDO();

$reservationTable = new ReservationTable($pdo);
$horaireTable = new HoraireTable($pdo);


$date = "";
$dayOfWeekNumber = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Access the data sent via AJAX
    $data = $_POST['dateInput']; // Replace 'key' with the actual key used in your AJAX request
    $date = $data ;
    $dayOfWeekNumber = date('N', strtotime($date));

} else {
   $date = date_format(new DateTime('now'), 'Y-m-d');
   $dayOfWeekNumber = date('N', strtotime($date));

}

$reservations = $reservationTable->getReservationByDate($date);

if(count($reservations) === 0){
  $horaire = $horaireTable->find(intval($dayOfWeekNumber));
  $nbr_creneau_midi = (timeToMin($horaire->getFinA()) -  timeToMin($horaire->getDebutA()))/15;
  $nbr_creneau_diner = (timeToMin($horaire->getFinB()) -  timeToMin($horaire->getDebutB()))/15;

  for($i = 0; $i<$nbr_creneau_midi; $i++){
    $reservation = new Reservation();
    $timeParts = explode(":", $horaire->getDebutA());
    $hours = intval($timeParts[0]) + $i/4;
    $minutes = intval($timeParts[1]) + ($i*15)%60;
    $reservation->setUserID(0);
    $reservation->setHeure($hours);
    $reservation->setMin($minutes);
    $reservation->setAllergie("");
    $reservation->setNombreCouverts(0);
    $reservation->setDate($date);
    $reservationTable->create($reservation);
  }
  for($i = 0; $i<$nbr_creneau_diner; $i++){
    $reservation = new Reservation();
    $timeParts = explode(":", $horaire->getDebutB());
    $hours = intval($timeParts[0]) + $i/4;
    $minutes = intval($timeParts[1]) + ($i*15)%60;
    $reservation->setUserID(0);
    $reservation->setHeure($hours);
    $reservation->setMin($minutes);
    $reservation->setAllergie("");
    $reservation->setNombreCouverts(0);
    $reservation->setDate($date);
    $reservationTable->create($reservation);
  }

}




?>

<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#portfolio">PORTFOLIO</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </div>
  </div>
</nav>
<div  class="container mt-4" style="margin-top:100px;">

<h1>Réservations</h1>
<form id="myForm" action="" method="post">
    <label for="date">Date:</label>
    <input type="date" id="dateInput" name="dateInput" value="<?= $date ?>" onchange="myFunction()">
  </form>

<div class="row">
    <?php foreach($reservations as $reservation): ?>
        <?php require 'card.php' ?> 
    <?php endforeach ?>
</div>
</div>

<script>
    function myFunction() {
    var date = document.getElementById("dateInput").value;
    console.log(date);
 /*   $.ajax({
            type : "POST",  //type of method
            url  : "/reservation/filter",  //your page
            data : { date : date },// passing the values
            success: function(res){  
                                    //do what you want here...
                    }
        });*/
    document.getElementById("myForm").submit();
    }
</script>