<script type="text/javascript">
function imprimer(page) {
	window.open(page,"Impression","menubar=no, status=no, scrollbars=no, menubar=no, width=900, height=900");
}
</script>


<?php
	//1--Recuperation de la valeur recherchee
	$recherche=$_REQUEST["search"];
	
	//2--Connexion avec la base
	include("connect.php");
	$total=0;
	
	//3--Requete de recherche
	
	$requete=mysqli_query($connect,"SELECT * FROM auto WHERE noserie LIKE '%$recherche%' 
															or marque LIKE '%$recherche%' 
															or modele LIKE '%$recherche%' ;") or die ("Erreur de requete");
		
		//Aller chercher la difference de date 
		$requete2=mysqli_query($connect,"Select datelocation from location where noserie LIKE '%$recherche%';") or die ("Erreur de requete2"); 		
			
			$nbre2=mysqli_num_rows($requete2);
			if($nbre2 >0)
			{
					while ($result2=mysqli_fetch_row($requete2))
				{	
					//$dateloca = $result2[2];
					//$dateretour = $result2[3];
				}
				//echo $dateloca;
			}	
			
			
	$nbre=mysqli_num_rows($requete);
	if($nbre >0)
	{
		echo "<table><th> Noserie</th>	<th>Marque </th>	<th>Modele </th>
		<th>Disponible </th>	<th>Prix </th>	<th>Photo </th>";
			while ($result=mysqli_fetch_row($requete))
		{	
	    $noserie = $result[0];
		$marque = $result[1];
		$modele = $result[2];
		$dispo = $result[3];
		$prix = $result[4];
		$photo = $result[5];
		
		
		$total+=$prix;
		//$total += $prix*$nbpersonne;
		
		echo "<tr><td>$noserie</td><td>$marque</td><td>$modele</td><td>$dispo</td><td>$prix $</td>
				 <td><img src='photo/$photo'  style='height:100px;width:150px'></img></td>
			  </tr>";
				
		}
		
		
		
		echo "<tr><td colspan='5' align='right'>TOTAL: $total $</td></tr>";
				
	
		
		/****************  Section Ouvrir le fichier a imprimer dans une nouvelle fenetre *******************/
		echo" <tr> <td colspan='9' align='right'>
				<a href=\"javascript:imprimer('printacceuil.php?val=$recherche')\">Print</a></td> </tr></table>";
		/**************** FIn section Impression ****************/	
		
	}
	else 
	{
		echo "Aucune auto trouver";
	}
															
?>