<?php
if (isset($_POST["entrermembre"]))
	{
		$loginmembre=test_input($_POST["loginmembre"]);
		$passwordmembre=sha1($_POST["passwordmembre"]);
		
		//2--Connexion a la base
		include("connect.php");
		
		//3--Requete sql
		$reqmembre=mysqli_query($connect,"select * from client where login='$loginmembre' and password='$passwordmembre'");
		
		//4-Analyse et affichage des resultats
		$nbremembre=mysqli_num_rows($reqmembre);
	
		//Recuperation des donnees par colonnes
		$ligne = mysqli_fetch_row($reqmembre);
		
		if ($nbremembre ==1)
		{
			//Recuperation des donnnes dans $_SESSION
			//Redirection vers la page  membre.php
		
			$_SESSION["code"]=$ligne[0];
			$_SESSION["nom"]=$ligne[2];
			$_SESSION["prenom"]=$ligne[1];
			$_SESSION["login"]=$ligne[5];
			$_SESSION["password"]=$ligne[6];
			
			echo '<script>window.location.href="membre.php";</script>';
	
		}
		else
		{
			echo "Login ou Password incorrecte";
		}
		
	}
	
?>	