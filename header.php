<?php
$bdd = new PDO('mysql:host=localhost;dbname=e-commerce','root','root');
?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" title="Mise en forme par défaut">

    <title>Le sneakerstore</title>
  </head>
  <body>
    <div class="row" id="general">
     <header>
    <nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="index.php"><img  id="logo" src="img/logo.jpg"  alt="logo"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Recherche">
  </form>
  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="shop.php">Shop</a>
        <?php
            if(isset($_SESSION['id'])){
                echo '<a class="nav-link" href="logout.php">Log Out</a>';
            }
            else {echo ' <a class="nav-link" href="singin.php">Sign In</a>';
                 }
          ?>
       
        
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="panier.php"><img id="card" src="img/cart_1.png" alt="image-panier"></a>
      </li>
    </ul>

  </div>
</nav>
</header>