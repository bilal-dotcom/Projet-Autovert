<script>
function add(id){	
	var qte = document.getElementById(id).value;
	location.href='membre.php?lien=membreauto&id=' + id + "&qte=" + qte;
	alert();
}

</script>


<?php

	if(isset($_GET["id"]))
	{
		$id=$_GET["id"];
		$qte=$_GET["qte"];
		$_SESSION['panier'][$id]=$qte;
		
		//Nombre d'items dans le panier
		$nbre=count($_SESSION['panier']);
		echo "Nombre d'items dans le panier: $nbre ";
	}		


include("connect.php");
$reqlistepret=mysqli_query($connect,"select * from auto") or die ("Erreur de selection");

ECHO "AUTOS ";

echo "<table border=1> <th>Noserie</th> <th>Marque</th> <th>Modele</th><th>Dispo</th> 
<th>Prix</th><th>QTE</th> <th>ADD</th>";

	while($reqresultat=mysqli_fetch_row($reqlistepret))
	{
		$listenoserie=$reqresultat[0];
		$listemarque=$reqresultat[1];
		$listemodele=$reqresultat[2];
		$listedispo=$reqresultat[3];
		$listeprix=$reqresultat[4];
		$listephoto=$reqresultat[5];
		
		echo "<tr> <td>$listenoserie</td> <td>$listemarque</td> <td>$listemodele</td> <td>$listedispo</td>
	
		<td>$listeprix $</td> 
		<td><input id='$reqresultat[0]' name='qte' value=1 ></input></td>
		<td><button onclick='add($reqresultat[0]);' >ADD</button> </td></tr>";
		
	}
	

echo "</table>";
	
	
	
	
?>


-----------------------------------------------------