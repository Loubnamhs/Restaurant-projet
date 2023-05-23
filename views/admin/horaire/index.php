<?php

use App\Authentication;
use App\Connection;
use App\Helpers\text;
use App\Model\Horaire;

Authentication::check();

$title = "Mes Horaires";
$pdo = Connection::getPDO();

$query = $pdo->query('SELECT * FROM horaire');
$horaires = $query->fetchAll(PDO::FETCH_CLASS, Horaire::class);


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

<h1>Gestion des Horaires</h1>
   
<table class="table table-striped">
    <thead>
        <th>Jour</th>
        <th>Créneaux déjeuner</th>
        <th>Créneaux dîner</th>
        <th>actions</th>
    </thead>
    <tbody>
        <?php foreach($horaires as $horaire): ?>
        <tr>
            <td>
              <a href="<?=$router->generate('admin_horaire_id',['id' => $horaire->getID()])?>">
              <?=($horaire->getJour())?>  
              </a>
            </td>
            <td>
              <h5><?=($horaire->getDebutA())?>  - <?=($horaire->getFinA())?></h5> 
              
            </td>
            <td>
            <h5><?=($horaire->getDebutB())?>  - <?=($horaire->getFinB())?></h5> 
            </td>
            <td>
            <a href="<?=$router->generate('admin_horaire_id',['id' => $horaire->getID()])?>" class="btn btn-primary"> 
              Éditer 
            </a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


</div>

