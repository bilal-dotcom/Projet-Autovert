<!-- Site de la bonne bouffe -->
<style>
ol {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: green;
  
}

li {
  float: left;
	display:inline;
	margin-right:80px;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: red;
}
</style>

<?php
	//Si la session n'est pas demarrer 
	if(!isset ($_SESSION))
	{
	session_start();
	
		if(!isset($_SESSION['panier']))
		{
			$_SESSION['panier']='';
		}
		else
		{
			$panier=$_SESSION['panier'];
			
		}
	}
	
	//Si la session est detruite, retourner a la page d'accueil
	if (!$_SESSION["login"] and !$_SESSION["password"])
	{
		echo "<script> window.location.href='index.php';</script>";
	}
	
?>

<?php
	//session_start();
	
	$code=$_SESSION["code"];
	$login=$_SESSION["login"];
	$password=$_SESSION["password"];
	
	echo "<center>Bienvenue $code </center>";
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

<center>
<div style='width:80%;height:25%;border:1px solid black'>

<img src="photo/auto9.PNG" style="width:100%;height:100%"></img>
</div>

<div style='width:80%;height:7%;border:1px solid black;'>
	<!-- Section menu-->
		
		<ol >
			<li><a href="membre.php?lien=membremembre"> Membre </a></li>
			<li><a href="membre.php?lien=membrelocation">Historique de location</a></li>
			<li><a href="membre.php?lien=membrepanier">Panier</a></li>
			<li><a href="membre.php?lien=membreauto"> Autos </a></li>
			<li><a href="membre.php?lien=deco"> Deconnexion </a></li>
		</ol>
</div>


<div style='width:80%;height:58%'>
	<!-- Section details-->
	
<?php

	//Recuperation du lien cliquer
	if (isset ($_REQUEST["lien"]))
	{
		$lien=$_REQUEST["lien"];

		
     //Selon le lien cliquer
			 //Selon le lien cliquer
		switch ($lien)
		{
		
			case "membremembre":
				include("membremembre.php");
			break;
			case "membrelocation":
				include("membrelocation.php");
			break;
			case "rechercheclient":
				include("rechercheclient.php");
			break;
			case "membrepanier":
				include("membrepanier.php");
			break;
			case "membreauto":
				include("membreauto.php");
			break;
			case "deco":
				include("deco.php");
			break;
		}
	
	}
	else
	{
		include("membremembre.php");
	}

?>

</div>

</center>