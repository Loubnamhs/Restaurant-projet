<?php

use App\Authentication;
use App\Connection;
use App\Helpers\text;
use App\Model\Article;

Authentication::check();

$title = "articles";
$pdo = Connection::getPDO();

$query = $pdo->query('SELECT * FROM articles');
$articles = $query->fetchAll(PDO::FETCH_CLASS, Article::class);


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

<h1>Gestion des articles</h1>

<?php if (isset($_GET['delete'])): ?>
<div class="alert alert-success">
    L'article a bien été supprimé
</div>
<?php endif ?>

   
<table class="table table-striped">
    <thead>
        <th>Titre</th>
        <th>Catégorie</th>
        <th>actions</th>
        <th><a href="/admin/article/new" class="btn btn-primary" style="margin-left: -200px;">Ajouter un article</a></th>
    </thead>
    <tbody>
        <?php foreach($articles as $article): ?>
        <tr>
            <td>
              <a href="<?=$router->generate('admin_article',['id' => $article->getArticleID()])?>">
              <?=($article->getNom_article())?>  
              </a>
            </td>
             
            <td>
             <h5><?=($article->getCategorie())?> </h5>
            </td>
            <td>
            <a href="<?=$router->generate('admin_article',['id' => $article->getArticleID()])?>" class="btn btn-primary"> 
              Éditer 
            </a>
            <form action="<?=$router->generate('admin_article_delete',['id' => $article->getArticleID()])?>" method="post"  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')" style="display:inline;" > 
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

