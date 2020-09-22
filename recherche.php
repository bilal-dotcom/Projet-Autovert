<head>

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
</head>

<div>
<h3>Recherche</h3>
</div>


<!--Formulaire de recherche-->
<form id="formsearch">
	<input id="search" name="search"> 
</form>

<div id="contenu" style="border:1px solid black">
	<script type="text/javascript">
		$("#contenu").html("Choisir votre auto");
	</script>

</div>

<?php

include("connect.php");


?>

<script type="text/javascript">
	//Section recherche sur keyup
	$("#search").keyup(function(){
		//serialize le formulaire dans une variable javascript
		var formsearch=$("#formsearch").serialize();
		
		//Vider le contenu de la div contenu
		$("#contenu").html("");
		
		//Loader le fichier de recherche avec le formulaire
		$("#contenu").load("recherche3.php?" + formsearch);
		
	});
		
	
</script>