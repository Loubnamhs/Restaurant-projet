<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
  

  <title><?= $title ?? 'Restaurant Le quai antique'?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="./static/css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="d-flex flex-column h-100" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">Restaurant Le Quai Antique</a>
    </div>
    

    


  
        <?= $content ?>
      

        <footer class="bg-light py-4 footer mt-auto">
          <div class="container">
            Page générée en  <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?> ms
          </div>

</footer>
</body>




</html>
