<?php 
use App\Connection;
use App\Authentication;
use App\Table\ImageTable;

Authentication::check();


$pdo = Connection::getPDO();
$id = explode("/",$_SERVER["REQUEST_URI"])[3];
$images = new ImageTable($pdo);
$images->delete($id);
//$sql = "DELETE FROM articles WHERE ArticleId=?";
//$stmt= $pdo->prepare($sql);
//$stmt->execute([$id]);
header('Location: ' .$router->generate('admin_image') . '?delete=1');

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

<h1>Suppression de <?= $id ?></h1>

</div>