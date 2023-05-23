<?php

use App\Connection;
use App\Model\User;

$title = "connexion";

$pdo = Connection::getPDO();



$err = "Inconnue";
if(!empty($_POST)){
  if(empty($_POST['email']) || empty($_POST['pwd']) ){
    $err = "Erreur formulaire";
  }
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $query = $pdo->prepare('SELECT * FROM users where email = :email AND mot_de_passe = :pwd;');
  $query->execute(array(
    "email" => $email, 
    "pwd" => $pwd
  ));
  $query->setFetchMode(PDO::FETCH_CLASS, User::class);
  $user = $query->fetch();

  if(empty($user)){
    $err = "Authentification failed";
  } else {

    $err = "Authentification success";
    $id = $user->getUserID();
    $router->generate('home', ['userID' => $id]);
    $url = "http://localhost:8000/home/". $id;
    header("Location: " . $url);
    exit;
  }


}



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
<div class="container mt-4" style="margin-top: 100px ;">



<div class="row">

<div class="col-sm-6" style="border:1px solid black;">
<?= $err == 'Inconnue' ? '': $err ?>
<h2>connexion</h2>
<form class="form-horizontal" action="/connexion" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pwd"  id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</div>


<div class="col-sm-6" style="border:1px solid black;">
<h2>Inscription</h2>
<form class="form-horizontal" action="/register" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email1">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email1" id="email1" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd1">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</div>


</div>
</div>

