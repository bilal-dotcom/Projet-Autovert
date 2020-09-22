
<h3>Recherche pour impression </h3>
<div id="form">
   <form method="post">
   <input type="text" name="user_query" placeholder="Recherche d'utilisateur"/>
   <input type="submit" name = "recherche" value="recherche"/>
   </form>

</div>
<script type="text/javascript">
function imprimer(page) {
	window.open(page,"Impression","menubar=no, status=no, scrollbars=no, menubar=no, width=900, height=900");
}
</script>


<?php

include("connect.php");


$total=0;

if (isset($_POST['recherche']))
{
	$val = $_POST['user_query'];
	
	echo "<table><th> Noserie</th>	<th>Marque </th>	<th>Modele </th>
	<th>Disponible </th>	<th>Prix </th>	<th>Photo </th>";
	$requete=mysqli_query($connect,"SELECT * FROM auto WHERE noserie LIKE '%$val%' 
															or marque LIKE '%$val%' 
															or modele LIKE '%$val%' ;") or die ("Erreur de requete");
	
	$nbre=mysqli_num_rows($requete);
	if($nbre >0)
	{
	
			while ($result=mysqli_fetch_row($requete))
		{	
	    $noserie = $result[0];
		$marque = $result[1];
		$modele = $result[2];
		$dispo = $result[3];
		$prix = $result[4];
		$photo = $result[5];
		
		//$total += $prix*$nbpersonne;
		$total+=$total;
		
		echo "<tr><td>$noserie</td><td>$marque</td><td>$modele</td><td>$dispo</td><td>$prix</td>
				 <td><img src='photo/$photo'  style='height:100px;width:150px'></img></td>
			  </tr>";
				
		}
	
	
	
		
	echo "<tr><td colspan='5' align='right'>TOTAL: $total $</td></tr>";
				
	
		
		/****************  Section Ouvrir le fichier a imprimer dans une nouvelle fenetre *******************/
		echo" <tr> <td colspan='9' align='right'>
				<a href=\"javascript:imprimer('printclient.php?val=$val')\">Print</a></td> </tr></table>";
		/**************** FIn section Impression ****************/	
	}
	else
	{
		echo "Aucune recette trouv&eacute;!";
	}
}

?>