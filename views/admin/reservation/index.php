<?php

use App\Authentication;
use App\Connection;
use App\Helpers\text;
use App\Model\Reservation;

Authentication::check();

$title = "reservation";
$pdo = Connection::getPDO();

$query = $pdo->query('SELECT * FROM reservations');
$reservations = $query->fetchAll(PDO::FETCH_CLASS, Reservation::class);


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
<div class="container mt-4" style="margin-top: 100px ;">

<h1>Gestion des Reservations</h1>

<?php if (isset($_GET['delete'])): ?>
<div class="alert alert-success">
    La réservation a bien été supprimé
</div>
<?php endif ?>

   
<table class="table table-striped">
    <thead>
        <th>Réservation</th>
        <th>Créneau</th>
        <th>Date</th>
        <th>actions</th>
        <th><a href="/admin/reservation/new" class="btn btn-primary" style="margin-left: -200px;">Ajouter une Réservation</a></th>
    </thead>
    <tbody>
        <?php foreach($reservations as $reservation): ?>
        <tr>
            <td>
              <a href="<?=$router->generate('admin_reservation_id',['id' => $reservation->getID()])?>">
              <?=($reservation->getID())?>  
              </a>
            </td>
             
            <td>
             <h5><?=($reservation->getHeure())?>:<?=($reservation->getMin())?> </h5>

            </td>
            <td>
             <h5><?=($reservation->getDate())?> </h5>
             
            </td>
            <td>
            <a href="<?=$router->generate('admin_reservation_id',['id' => $reservation->getID()])?>" class="btn btn-primary"> 
              Éditer 
            </a>
            <form action="<?=$router->generate('admin_reservation_delete',['id' => $reservation->getID()])?>" method="post"  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Menu ?')" style="display:inline;" > 
            <button  class="btn btn-danger" >
            Supprimer
            </button> 
             
            </form>
            </td>

          


        </tr>
        <?php endforeach ?>
    </tbody>
</table>


</div>

