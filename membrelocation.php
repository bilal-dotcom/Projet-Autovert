<script type="text/javascript">
function imprimer(page) {
	window.open(page,"Impression","menubar=no, status=no, scrollbars=no, menubar=no, width=900, height=900");
}
</script>




<?php
	$code=$_SESSION["code"];
?>

<form method="post">
			<table border="0">
				<tr><td> 
						<select name="choix">
							<?php
							
							include("connect.php");
								$code=$_SESSION["code"];

								//Requete de selection de idclient
								$reqidclient=mysqli_query($connect,"select datelocation from location where code='$code'");
								
								  while($listeidclient= mysqli_fetch_row($reqidclient))
							   {
								   $code = $listeidclient[0];
								   
								   //Choix par defaut si je clique sur ok
								   if ($code==$choixid)
								   {
								   echo "<option value='$code' selected > $code </option>";  
								   }
								   
								   else
								   {
									    echo "<option value='$code'  > $code </option>";  
								   }
							   }
								
							?>
						</select>
					</td>
				</tr>
				<tr>
				</tr>
				<tr><input type="submit" name="valider" value="ok"></tr>
			</table>
		</form>
		
		
<?php
		
	if(isset($_POST["valider"]))
	{
		$total=0;
		$total1=0;
		
		$datechoisi =($_POST['choix']);
			$code=$_SESSION["code"];

			$requete2=mysqli_query($connect,"SELECT * FROM location WHERE datelocation='$datechoisi' and code='$code' ") or die ("Erreur de requete");

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
				

			$requete=mysqli_query($connect,"SELECT * FROM location WHERE datelocation='$datechoisi' and code='$code' ") or die ("Erreur de requete");
			
	$nbre=mysqli_num_rows($requete);
	if($nbre >0)
	{
		echo "<table border=1><th> Code</th><th>Noserie </th>	<th>Date location </th>
		<th>Date retour </th><th>Prix location </th><th>Nbre de jours</th>";
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
		//$total += $prix*$nbpersonne;
		
		echo "<tr> <td>$code2</td><td>$noserie</td><td>$dateloca</td><td>$dateretour</td>
						<td>$prix $</td><td>$nbJours </td>
			</tr>";
				
		}
		
		
		echo "<tr><td colspan='5' align='right'>TVS: $tvs $</td></tr>";
		echo "<tr><td colspan='5' align='right'>TVQ: $tvq $</td></tr>";
		echo "<tr><td colspan='5' align='right'>TOTAL: $total1 $</td></tr>";
				
	
		
		/****************  Section Ouvrir le fichier a imprimer dans une nouvelle fenetre *******************/
		echo" <tr> <td colspan='9' align='right'>
				<a href=\"javascript:imprimer('printclient.php?val=$datechoisi')\">Print</a></td> </tr></table>";
		/**************** FIn section Impression ****************/	
		
	}
		
	}
		
?>
		
		
