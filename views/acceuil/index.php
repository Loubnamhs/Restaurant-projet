<?php

use App\Authentication;
use App\Connection;
use App\Helpers\text;
use App\Model\Horaire;
use App\Table\HoraireTable;
use App\Table\ImageTable;

Authentication::check();

$title = "Acceuil";
$pdo = Connection::getPDO();
$horaireTable = new HoraireTable($pdo);
$horaires = $horaireTable->getHoraire();
$imageTable = new ImageTable($pdo);
$images = $imageTable->getImages();


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


<div class="jumbotron text-center">
  <h1>Cuisine authentique italienne</h1> 
  <p>Toutes les saveurs de l'Italie dans votre assiette,
un voyage culinaire à couper le souffle </p> 
  
</div>

<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Les mots du Chef Arnaud Michant</h2><br>
      <p>Le Quai Antique est né de ma passion de la Savoie , de ses produits et de ses producteurs. C'est la raison pour laquelle j'ai décidé d'ouvrir mon troisème restaurant  dans cette région.Le Quai Antique vous offrira une expérience gastronomique à travers une cuisine sans artifice au déjeuner comme au dîner</p>
     
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Nos valeurs</h2><br>
      <p><strong>Mission:</strong> Notre mission est de vous garantir des produits de qualité , issus d'un circuit court, c'est donc pour cela que nous collaborons avec des producteurs de la Savoie.<br>Ainsi nous vous garontissons des produits frais, et une expérience gastronomique, notre carte est réguliérement renouveller dans l'unique but de vous proposer des produits de saison.<br>Vous retrouverez nos valeurs dans vos assiettes.</p>
    </div>
  </div>
</div>

<div id="services" class="container-fluid text-center">
  <h2>Nos Services</h2>
  
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-glass logo-small"></span>
      <h4>Bar</h4>
      <p>Un large choix d'apéritifs et de boissons</p>
    </div>
    
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-cutlery logo-small"></span>
      <h4>Restaurant</h4>
      <p>Une cuisine italienne, des plats raffinés</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-calendar logo-small"></span>
      <h4>Réservations</h4>
      <p>Réserver votre table à tout moment, pensez à vous indentifier.</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>Circuit court</h4>
      <p>Nous collaborons avec les producteurs  de la Savoie pour vous garantir des produits frais et de saison.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>Amour</h4>
      <p>Notre Chef et toute notre équipe pensent à rajouter une dose d'amour à chaque plat servi</p>
    </div>
    
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-hourglass logo-small"></span>
      <h4 style="color:#303030;">Rapidité</h4>
      <p>Nous vous garontissons un service efficace et agréable</p>
    </div>
  </div>
</div>


<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Bon apétit.. </h2><br>
  
  <div class="row text-center slideanim">
    <?php foreach ($images as $image):?>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="<?= $image->getUrl() ?>" alt="<?= $image->getName() ?>" width="400" height="300"> 
      </div>
    </div>
    <?php endforeach?>
    <br>
    <a href="/carte" class="btn btn-success">Découverez notre carte</a>
  </div><br>


  
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">HORAIRE</h2>
  <div class="row">
    <div class="col-sm-5">
      <p><span class="glyphicon glyphicon-map-marker"></span> Chambéry, France</p>
      <p><span class="glyphicon glyphicon-phone"></span> +33 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> support@lequaiantique.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <?php foreach ($horaires as $horaire): ?>
      <div class="row">
        <div class="col-sm-4 form-group">
          <h5><?= $horaire->getJour()?></h5>
        </div>
        <div class="col-sm-4 form-group">
        <h5><?= $horaire->getDebutA() ?> - <?= $horaire->getFinA() ?></h5></div>
        <div class="col-sm-4 form-group">
        <h5><?= $horaire->getDebutB() ?> - <?= $horaire->getFinB() ?></h5></div>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</div>




<footer class="container-fluid text-center">

</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
