<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=e-commerce','root','root');

if (isset($_GET['id']) AND $_GET['id'] > 0)
{
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare("SELECT * FROM users WHERE id =?");
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();

}

  $db = new PDO('mysql:host=localhost;dbname=e-commerce', 'root','root');
  $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);     
  $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); 



  
  $new = $db->prepare("SELECT * FROM produits ORDER BY id DESC LIMIT 0,4");
  $new->execute();
  $prod = $new->fetchAll();
 
include_once "header.php";
?>

     <div class="row contenu">
      
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="img/slide1.jpg" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="img/slide2.jpg" alt="Second slide">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="img/slide3.jpg" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>
          <div class="row index-produit">
            <h1 id="produit">Products</h1>
          <div class="card-group">



          <?php
            foreach ($prod as $p )  {
          ?>
              <div class="card">
                <img class="card-img-top" src="admin/imgs/<?php echo $p['name']; ?>.jpeg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $p["name"]; ?></h5>
                  <p class="card-text"><?php echo $p["prix"]; ?> €</p>
                  <div class="detailprod"><a href="produc.php?id=<?php echo $p['id']; ?>"><button type="button" class="btn">Voir détail</button></a></div>
                </div>
              </div>

          <?php
            }
          ?>




         </div>
          </div>
      
     </div> 

<?php

include_once "footer.php";

?>





