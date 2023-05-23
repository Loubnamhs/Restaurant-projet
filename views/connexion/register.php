<?php

use App\Connection;
use App\Model\User;

$title = "connexion";
try{

    $pdo = Connection::getPDO();

    echo 'Connection Success ';

    if(!empty($_POST)){
        if(empty($_POST['email1']) || empty($_POST['pwd1']) ){
        $err = "Erreur formulaire";
    }
    $email = $_POST['email1'];
    $pwd = $_POST['pwd1'];
    $req = $pdo->prepare("INSERT INTO users (email,mot_de_passe,nom,prenom,allergies,convives) VALUES ('".$email."','".$pwd."' , 'nhnh', 'mmi', 'luku', 2)");
    $req->execute(array(
        "email" => $email, 
        "mot_de_passe" => $pwd
        ));
    $err = "Votre compte a été crée avec succés ." ;

//    var_dump($pdo);
//    $stmt->execute([$_POST['email1'],$_POST['pwd1'],"lou1","lili1","allergie1",2]);
//    dd($stmt);
    }
} catch (PDOException $e) {
    $err =  $e->getMessage();
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

<h1><?= $err ?></h1>

</div>