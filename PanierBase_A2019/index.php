<?php
/** Tables utilisees: CLIENTS 1-->N ACHATS N<--1 PRODUITS **/
/** CLIENTS(idclient,nom,prenom,telephone,datenaissance,photo,login,password) **/
/***  PRODUITS(id,nom,qte,prix) ***/
/** ACHATS(noachat,idclient,id,quantite,prix,dateachat)**/

if(!isset($_SESSION))
{
	session_start();
	
}

?>
<center>
<h3> Connectez-vous pour Acheter! </h3>
<form method="post">
<table>
<tr> <td> Login</td> <td><input type="text" name='login' value=""></td> </tr>
<tr> <td>Password </td><td>	<input type="password" name='password' value=""></td> </tr>
<tr> <td> 	<input type="submit" name='entrer' value="Entrer"></td> </tr>
</table>
</form>


<?php
//si cliquer lsur Entrer
if(isset($_POST["entrer"]))
{
	//1) Connexion avec la BD.
	include("connexion.php");
	//2) Recupation des donnees
	$login = $_POST["login"];
	$password= $_POST["password"];
	//3) Requete SQL de selection
	$reqselect=mysqli_query($conn,"select * from clients where login='$login' 
	and password='$password'") or die("Erreur de requete de selection");
	//4) Analyse et affichage des resultats
	$nbre=mysqli_num_rows($reqselect);
	if($nbre >0)
	{
		while($reqresult=mysqli_fetch_row($reqselect))
		{
			$_SESSION["idclient"]=$reqresult[0];
			$_SESSION["login"]=$reqresult[7];
			$_SESSION["password"]=$reqresult[8];
		}
		//rediriger vers la page indexmembre.php
		echo"<script> window.location.href='indexmembre.php'; </script> ";
		
	}
	else
	{
		echo" Login et/ou password sont incorrects!";
	}
}


?>

</center>