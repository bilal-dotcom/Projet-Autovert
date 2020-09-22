<head>

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
</head>


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
	margin-right:100px;
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


<center>
<div style='width:80%;height:35%;border:1px solid black'>

<img src="photo/auto9.PNG" style="width:100%;height:100%"></img>
</div>

<div  style='width:80%;height:7%;border:1px solid black;'>
	<!-- Section menu-->
		<ol>
			<li><a href="index.php?lien=accueil"> Accueil </a></li>
			<li><a href="index.php?lien=login"> Login </a></li>
			<li><a href="index.php?lien=recherche"> Recherche </a></li>
			<li><a href="index.php?lien=insertnewclient"> New Client </a></li>
		</ol>
</div>

<?php
//Recuperation du lien cliquer
	if (isset ($_REQUEST["lien"]))
	{
		$lien=$_REQUEST["lien"];

		
     //Selon le lien cliquer
			 //Selon le lien cliquer
		switch ($lien)
		{
		
			case "accueil":
				include("accueil.php");
			break;
			case "login":
				include("login.php");
			break;
			case "recherche":
				include("recherche.php");
			break;
			case "insertnewclient":
				include("insertnewclient.php");
			break;

		}
	
	}
	
	else
	{
		include("accueil.php");	
	}
	
?>
	
<script type="text/javascript" src="fonctionsJquery.js"></script >
</center>