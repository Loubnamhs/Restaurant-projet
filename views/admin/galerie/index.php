<?php

use App\Authentication;
use App\Connection;
use App\Helpers\text;
use App\Model\Image;

Authentication::check();

$title = "image";
$pdo = Connection::getPDO();

$query = $pdo->query('SELECT * FROM image');
$images = $query->fetchAll(PDO::FETCH_CLASS, Image::class);


?>





<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="/admin">ARTICLES</a></li>
        <li><a href="/admin/menu">MENUS</a></li>
        <li><a href="/admin/reservation">RESERVATIONS</a></li>
        <li><a href="/admin/horaire">HORAIRES</a></li>
        <li><a href="/admin/image">GALERIE</a></li>
        <li><a href="#contact">DECONNEXION</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4" style="margin-top: 100px ;">

<h1>Gestion de la Galerie d'Image</h1>

<?php if (isset($_GET['delete'])): ?>
<div class="alert alert-success">
    L'image a bien été supprimé
</div>
<?php endif ?>

   
<table class="table table-striped">
    <thead>
        <th>Id</th>
        <th>Titre</th>
        <th>Url</th>
        <th>actions</th>
        <th><a href="/admin/image/new" class="btn btn-primary" style="margin-left: -200px;">Ajouter une image</a></th>
    </thead>
    <tbody>
        <?php foreach($images as $image): ?>
        <tr>
            <td>
              <h5>#<?=($image->getID())?> </h5>
            </td>
            <td>
              <a href="<?=$router->generate('admin_image_id',['id' => $image->getID()])?>">
              <?=($image->getName())?>  
              </a>
            </td>
             
            <td>
             <img src="<?=($image->getUrl())?>" height="64px" width="64px" />
            </td>
            <td>
            <a href="<?=$router->generate('admin_image_id',['id' => $image->getID()])?>" class="btn btn-primary"> 
              Éditer 
            </a>
            <form action="<?=$router->generate('admin_image_delete',['id' => $image->getID()])?>" method="post"  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet Image ?')" style="display:inline;" > 
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

