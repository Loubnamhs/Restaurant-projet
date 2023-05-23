<?php

use App\Connection;
use App\Helpers\text;
use App\Model\Article;

$title = "articles";
$pdo = Connection::getPDO();

$query = $pdo->query('SELECT * FROM articles');
$articles = $query->fetchAll(PDO::FETCH_CLASS, Article::class);


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
<div class="container mt-4">

<h1>Mes articles</h1>


<div class="row">
    <?php foreach($articles as $article): ?>
        <?php require 'card.php' ?> 
    <?php endforeach ?>
</div>
</div>

