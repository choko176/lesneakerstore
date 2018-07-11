<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=e-commerce','root','root');

if (isset($_POST['gotoco']))
{
	$pseudoco = htmlspecialchars($_POST['pseudoco']);
	$mdpco = sha1($_POST['mdpco']);

	if(!empty($_POST['pseudoco']) AND !empty($_POST['mdpco']))
	{
		$repuser = $bdd->prepare("SELECT * FROM users WHERE pseudo = ? AND mdp = ?");
		$repuser->execute(array($pseudoco, $mdpco));
		$userexit = $repuser->rowCount();

		if ($userexit == 1)
		{
			$userinfo= $repuser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $userinfo['mail'];
			header("Location: index.php?id=".$_SESSION['id']);
		}
		else
		{
			$erreur ="Pseudo ou mot de passe invalide";
		}
	}
	else
	{
		$erreur = " Tous les champs doivent etre remplie";
	}

}


include_once "header.php";
    ?>
     <div class="row contenu">
          <div class="col">
      <h2>LE SNEAKERSTORE</h2>
      <div class="log">
        <form method="POST" action="">
          <input type="text" name="pseudoco" placeholder="Peseudo"><br>
          <input type="password" name="mdpco" placeholder="Password"><br>
          <input type="submit" name="gotoco" value="LOGIN" class="blog"><br>
          <a href="#">FORGET YOUR PASSEWORD ?</a>
          <br>
        </form>
            <?php
			if(isset($erreur))
			{
				echo $erreur;
			}
			?>
      </div>
      <br>
      <br>
      <div class="newuser">
        <p>  NEW ? SIGN IN </p>
       <a href="inscription.php"> <button type="button" class="new"> CREATE</button> </a>
      </div>
</div>
     </div> 
     <footer id="footer" class="row">
  <div class="social col-6">
    <p>Retrouver nous sur nos reseaux</p>
    <ul id="icons">
      <li>
          <a href="https://www.youtube.com/" ><img class="icon" src="img/youtube.png" alt="youtube" /></a>
      </li>
      <li>
          <a href="mail" ><img  class="icon" src="img/messenger.png" alt="messenger"   /></a>
      </li>
      <li>
          <a href="https://twitter.com/" ><img class="icon" src="img/twitter.png" alt="twitter"   /></a>
      </li>
      <li>
          <a href="https://www.linkedin.com/" ><img class="icon" src="img/linkedin.png" alt="linkedin"   /></a>
      </li>
      <li>
          <a href="https://www.facebook.com/" ><img class="icon" src="img/facebook.png" alt="facebook"  /></a>
      </li>
      <li>
          <a href="https://www.instagram.com/" ><img class="icon" src="img/instagram.png" alt="instagram"  /></a>
      </li>
      

    </ul>
  </div>
    <div class="faq col-6">
        <ul>
            <li> <a href="#">Plan du site</a> </li>
            <li> <a href="#">Mention légale</a> </li>
            <li> <a href="#">Condition général</a> </li>
            <li> <a href="#">Condition de ventes</a> </li>
        </ul>
    </div>
</footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>