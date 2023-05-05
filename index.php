<?php
try
{
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=restaurant;charset=utf8',
    'restaurant',
    'ax8r9dhacham123'

);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  

  <title>restaurant Le Quai Antique</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: #27AE60;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #F7DC6F ;
    font-size: 50px;
  }
  .logo {
    color: #F7DC6F ;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #F7DC6F ;
  }
  .carousel-indicators li {
    border-color: #F7DC6F ;
  }
  .carousel-indicators li.active {
    background-color: #F7DC6F ;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #F7DC6F ; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #F7DC6F ;
    background-color: #fff !important;
    color: #F7DC6F ;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #F7DC6F  !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #FF0000;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: #1E8449 ;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #F7DC6F  !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #F7DC6F ;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Restaurant Le Quai Antique</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#portfolio">PORTFOLIO</a></li>
à        <li><a href="#contact">CONTACT</a></li>
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

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Bon apétit.. </h2><br>
  
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="image/pizza.jpeg" alt="Pizza" width="400" height="300">
        
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="image/dessert.jpeg" alt="Dessert" width="400" height="300">
        
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="image/salade.jpeg" alt="Salade" width="400" height="300">
        
      </div>
    </div>
  </div><br>
  
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Chambéry, France</p>
      <p><span class="glyphicon glyphicon-phone"></span> +33 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> support@lequaiantique.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
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
