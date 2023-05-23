<?php

use App\Connection;
use App\Helpers\text;
use App\Model\Article;
use App\Table\ArticleTable;

$title = "articles";
$pdo = Connection::getPDO();

$articleTable = new ArticleTable($pdo);
$categories = $articleTable->getCategories();




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
<div class="container mt-4" style="margin-top: 100px;">

<h1>Carte</h1>

<?php foreach ($categories as $categorie): ?>
    <?php $articles = $articleTable->getArticleByCategorie($categorie->Categorie)?>
    <h3><?= $categorie->Categorie ?> </h3>
    <?php foreach ($articles as $article): ?>
        <?php require 'card.php' ?> 
    <?php endforeach ?>
<div class="row">
 
</div>
<?php endforeach ?>
</div>

