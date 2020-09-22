<script>
function add(id){
	var qte = document.getElementById(id).value;
	location.href='indexmembre.php?lien=produits&id=' + id + "&qte=" + qte;
}
</script>
<?php
/***  table produits(id,nom,qte,prix) ***/

//Recuperation de ID et qte
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
	$qte=$_GET["qte"];
	$_SESSION['panier'][$id]=$qte;
	
	//Nombre d'items dans le panier
	$nbre=count($_SESSION['panier']);
	echo "Nbre d'items dans le panier:  $nbre";
}
//Requete d'affichage de produits
$reqprod=mysqli_query($conn,"select * from produits") or die("Erreur de requete SQL!");
echo "<h3> Liste des produits </h3><table border='1'>
<tr><th>ID </th><th>NOM </th><th> PRIX</th><th>QTE </th> </tr>";
while($resultat=mysqli_fetch_row($reqprod))
{
	
	echo "<tr> <td>$resultat[0]</td> <td>$resultat[1]</td>
	<td>$resultat[3]</td>
	<td><input id='$resultat[0]' name='qte' value='1'></td>
	<td><button onclick='add($resultat[0]);'> ADD</button></td></tr>";
}
echo "</table>";
//Pour voir le contenu de SESSION
//print_r($_SESSION);

?>