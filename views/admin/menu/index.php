<?php

use App\Authentication;
use App\Connection;
use App\Helpers\text;
use App\Model\Menu;

Authentication::check();

$title = "menus";
$pdo = Connection::getPDO();

$query = $pdo->query('SELECT * FROM menus');
$menus = $query->fetchAll(PDO::FETCH_CLASS, Menu::class);


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

<h1>Gestion des menus</h1>

<?php if (isset($_GET['delete'])): ?>
<div class="alert alert-success">
    Le Menu a bien été supprimé
</div>
<?php endif ?>

   
<table class="table table-striped">
    <thead>
        <th>Titre</th>
        <th>Formule</th>
        <th>actions</th>
        <th><a href="/admin/menu/new" class="btn btn-primary" style="margin-left: -200px;">Ajouter un Menu</a></th>
    </thead>
    <tbody>
        <?php foreach($menus as $menu): ?>
        <tr>
            <td>
              <a href="<?=$router->generate('admin_menu_id',['id' => $menu->getID()])?>">
              <?=($menu->getNom())?>  
              </a>
            </td>
             
            <td>
             <h5><?=($menu->getFormule())?> </h5>
            </td>
            <td>
            <a href="<?=$router->generate('admin_menu_id',['id' => $menu->getID()])?>" class="btn btn-primary"> 
              Éditer 
            </a>
            <form action="<?=$router->generate('admin_menu_delete',['id' => $menu->getID()])?>" method="post"  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Menu ?')" style="display:inline;" > 
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

