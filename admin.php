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
	}
	
	//Si la session est detruite, retourner a la page d'accueil
	if (!$_SESSION["login"] and !$_SESSION["password"])
	{
		echo "<script> window.location.href='index.php';</script>";
	}
	
?>


<center>
<div style='width:80%;height:25%;border:1px solid black'>

<img src="photo/auto9.PNG" style="width:100%;height:100%"></img>
</div>

<div style='width:80%;height:7%;border:1px solid black;'>
	<!-- Section menu-->
		
		<ol >
			<li><a href="admin.php?lien=adminadmin"> Admin </a></li>
			<li><a href="admin.php?lien=adminmembre"> Membre </a></li>
			<li><a href="admin.php?lien=adminlocation">Location</a></li>
			<li><a href="admin.php?lien=adminauto"> Auto </a></li>
			<li><a href="admin.php?lien=deco"> Deconnexion </a></li>
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
		
			case "adminadmin":
				include("adminadmin.php");
			break;
			case "adminmembre":
				include("adminmembre.php");
			break;
			case "adminlocation":
				include("adminlocation.php");
			break;
			case "adminauto":
				include("adminauto.php");
			break;
			case "deco":
				include("deco.php");
			break;
			case "insautoadmin":
				include("insautoadmin.php");
			break;
			
		}
	
	}
	else
	{
		include("adminadmin.php");
	}

?>

</div>

</center>