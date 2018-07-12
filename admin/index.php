<?php
session_start();

	$user='z';
	$password_definit='z';

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username&&$password){

			if($username==$user&&$password==$password_definit){

				$_SESSION['username']=$username;	
				header('Location: admin.php');

			}else{

				echo'Identifiants eronnes';

			}

		}else{

			echo'Veuillez remplir tous les champs !';

		}

	}


?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link href="style.css" type="text/css" rel="stylesheet"/>

<h1 class="admin">Administration - Connexion</h1>

<form action="" method="POST">
<h3>Pseudo :</h3><input type="text" name="username"/><br/><br/>
<h3>Mot-de-passe :</h3><input type="password" name="password"/><br/><br/>
<input type="submit" name="submit"/><br/><br/>
</form>