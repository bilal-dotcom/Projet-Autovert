<?php
	session_start();
	
	$idclient=$_SESSION["idclient"];
	$login=$_SESSION["login"];
	$password=$_SESSION["password"];
	
	echo "<center>Bienvenue $idclient </center>";
	if(!isset($_SESSION['panier']))
	{
		//Initialiser le panier
		$_SESSION['panier']='';
		//version recente de PHP
		//$_SESSION['panier']=[];
	}
	else
	{
		$panier=$_SESSION['panier'];
		//$nbrepanier=count($_SESSION['panier']);
		//echo $nbre;
	}

?>
<style>
	li{
		display:inline;
		margin-right:100px;
	}
</style>

<center>
<ul>
	<li> <a href="indexmembre.php?lien=accueil"> Accueil</a> </li>
	<li><a href="indexmembre.php?lien=produits">Produit </a> </li>
	<li> <a href="indexmembre.php?lien=panier">Panier </a></li> 
</ul>
<div>
<?php
//1) Connexion avec la BD.
	include("connexion.php");
if(isset($_GET["lien"]))
{
	$lien= $_GET["lien"];
	switch($lien)
	{
		case"accueil":
			include("accueil.php");
		break;
		case"produits":
			include("produits.php");
		break;
		case"panier":
			include("panier.php");
		break;
	}
}
else
{
	include("accueil.php");
}
?>
</div>

</center>