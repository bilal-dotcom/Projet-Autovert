<!-- Methode de Javascript pour imprimer -->
<script>
	window.print();
</script>

<?php
$total=0;

//1) Recuperation du code a retrouver pour imprimer
	include("connect.php");
	//$recherche=$_REQUEST["search"];
	$recherche=$_GET["val"];
	//2) connexion avec mysql deja etablie
	//3) Requete SQL
	$requete=mysqli_query($connect,"SELECT * FROM auto WHERE noserie LIKE '%$recherche%' 
															or marque LIKE '%$recherche%' 
															or modele LIKE '%$recherche%' ;");
	//Analyse et affichage des resultats
		$val=strtoupper($_GET["val"]);
		echo "<h3>Liste de autos trouv&eacute; pour $val !</h3>";
		echo"<table>
		
		<tr><th> Noserie</th>	<th>Marque </th>	<th>Modele </th>
	<th>Disponible </th>	<th>Prix </th>	<th>Photo </th></tr>";
		
			while ($result=mysqli_fetch_row($requete))
		{
			$noserie = $result[0];
			$marque = $result[1];
			$modele = $result[2];
			$disponible = $result[3];
			$prix = $result[4];
			$photo = $result[5];
			
			$total+=$total+$prix;
			//$total += $prix*$nbpersonne;
			
			//affichage des donnees dans un tableau
			echo "<tr><td>$noserie</td><td>$marque</td><td>$modele</td><td>$disponible</td><td>$prix</td>
				 <td><img src='photo/$photo'  style='height:100px;width:150px'></img></td>
			  </tr>";
				
		}
	echo "<tr><td colspan='5' align='right'>TOTAL: $total $</td></tr>";

?>

