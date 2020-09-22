<!-- Methode de Javascript pour imprimer -->
<script>
	window.print();
</script>

<?php
$total=0;
$total1=0;

//1) Recuperation du code a retrouver pour imprimer
	include("connect.php");
	//$recherche=$_REQUEST["search"];
	$recherche=$_GET["val"];
	//2) connexion avec mysql deja etablie
	//3) Requete SQL
	$requete=mysqli_query($connect,"SELECT * FROM location WHERE datelocation='$recherche';") or die ("Erreur de requete");
	
	$requete2=mysqli_query($connect,"SELECT * FROM location WHERE datelocation='$recherche'  ") or die ("Erreur de requete");

	$nbre2=mysqli_num_rows($requete2);
	if($nbre2 >0)
	{
			while ($result2=mysqli_fetch_row($requete2))
		{	
			$dateloca = $result2[2];
			$dateretour = $result2[3];
			echo $dateloca;
			echo $dateretour;
			
							// On transforme les 2 dates en timestamp
				$date1 = strtotime($dateloca);
				$date2 = strtotime($dateretour);
				 
				// On récupère la différence de timestamp entre les 2 précédents
				$nbJoursTimestamp = $date2 - $date1;
				 
				// ** Pour convertir le timestamp (exprimé en secondes) en jours **
				// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc : 
				$nbJours = $nbJoursTimestamp/86400; // 86 400 = 60*60*24 
				 
				echo "Nombre de jours : ".$nbJours;
		}
	}
	
	
	//Analyse et affichage des resultats
		$val=strtoupper($_GET["val"]);
		echo "<h3>Liste des location trouv&eacute; pour $val !</h3>";
		echo"<table>
		
		<tr><th> Code</th><th>Noserie </th>	<th>Date location </th>
		<th>Date retour </th><th>Prix location </th></tr>";
		
			while ($result=mysqli_fetch_row($requete))
		{
			$code2 = $result[0];
			$noserie = $result[1];
			$dateloca = $result[2];
			$dateretour = $result[3];
			$prix = $result[4];
		
			
			$total=$prix*$nbJours;
			
			$tvs=$total*0.05;
			$tvq=$total*0.0975;
		
			$total1+=$total + $tvs +$tvq ;
			//affichage des donnees dans un tableau
				
					echo "<tr> <td>$code2</td><td>$noserie</td><td>$dateloca</td><td>$dateretour</td>
						<td>$prix $</td>
			</tr>";
				
				
		}
		echo "<tr><td colspan='5' align='right'>TVS: $tvs $</td></tr>";
		echo "<tr><td colspan='5' align='right'>TVQ: $tvq $</td></tr>";
		echo "<tr><td colspan='5' align='right'>TOTAL: $total1 $</td></tr>";

?>


