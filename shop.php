<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=e-commerce','root','root');

include_once "header.php";
?>

<div class="row shop">
       <h1 id="produit">Nos produits</h1>
    <div class="card-group">
<?php
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



  $new = $db->prepare("SELECT * FROM produits ORDER BY id ");
  $new->execute();
  $prod = $new->fetchAll();
 
?>

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
  <?php
include_once "footer.php";

 
