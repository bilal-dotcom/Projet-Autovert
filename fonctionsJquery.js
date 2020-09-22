		function accueil(){
		//Effacer le contenu de id="liste"
		$("#contenu").html("");
		//Charger la page accueil.php
		$("#contenu").load("accueil.php");
	}
	//Section Ajout de recettes
	function login(){
		//Effacer le contenu de id="liste"
		$("#contenu").html("");
		//Charger la page ajoutrecette.php
		$("#contenu").load("login.php");
	}
	
	function recherche(){
		//Effacer le contenu de id="liste"
		$("#contenu").html("");
		//Charger la page ajoutrecette.php
		$("#contenu").load("recherche.php");
	}
	
	function gomembre()
	{
		var formlogin = $("#formlogin").serialize();
		$("#resultat").load("login1.php?" + formlogin);
	}