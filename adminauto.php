<?php  

$idmembre= $_SESSION["login"];

echo "Recettes du membre.";

echo"<p><a href='admin.php?lien=insautoadmin'><input type='button' name='ins' value='Nouvel auto'></input></a>";
include("connect.php");
	/*Debut:: Mise a jour des donnes       */
		
		//Pour modifier une recette
		if (isset($_POST["update"]))
		{
			//1--Recuperation des donnees a mettre a jour
			$noserie=$_POST["noserie"];
			
			$marque=$_POST["marque"];
			$modele=$_POST["modele"];
			$disponible=$_POST["disponible"];
			$prix=$_POST["prix"];
			$photo=$_POST["photo"];
			
			$idmembremaj=$_POST["idmembre"];
			
			//2--Requete de mise a jours
			$reqmiseajour=mysqli_query($connect,"update auto set marque='$marque',modele='$modele',disponible='$disponible',prix='$prix'
											where noserie='$noserie'") or die ("Erreur de update");
		
			//3--Analyse et affichage des resultats de la requete
			$nbremaj=mysqli_affected_rows($connect);
			if($nbremaj>0)
			{
				echo "Mise a jour de " . $marque . " reussi";
			}
			else 
			{
				echo "Aucune mise a jour";
			}
		}
	
		
	
	/*Debut:: Mise a jour des donnes       */

//Je peux ecrire GET ou REQUEST

	if(isset($_GET["oper"]))
	{
		$oper=$_GET["oper"];
		
		
		//Selon la requete a effectuer
		switch($oper)
		{
			case "Maj":
				$idrecette=$_GET["idrecette"];
			break;
			
			case "Sup":
				$supidrecette=$_GET["idrecette"];
				
				//Je vais chercher le nom de la recette
			$reqlisterecette2=mysqli_query($connect,"select * from recette") or die ("Erreur de selection 2");
					while($reqresultat2=mysqli_fetch_row($reqlisterecette2))
					{
						$listerecette2=$reqresultat2[1];
					}
					
					//Requete de suppression
				$reqsupclient=mysqli_query($connect,"delete from recette where idrecette='$supidrecette'") or die ("Erreur de suppression");
					
					$nbresup=mysqli_affected_rows($connect);
					if($nbresup > 0)
					{
						echo "Suppression de " . $listerecette2 . " reussi!";
					}
					
					else
					{
						echo "Echec de suppression";
					}
			break;
			
			case "Ins":
				$insidrecette=$_GET["idrecette"];
				
			break;
		}
	
	}

	else 
	{
		$idrecette='';
	}
//Liste de clients
//1--Connexion deja etablie
//2--
echo "<form method='post'>";

//echo"<a href='admin.php?lien=insrecette'><input type='button' name='ins' value='Nouvelle recette'></input></a>";

//echo"<tr><td><a href='admin.php?lien=insrecette'><input type='button' name='ins' value='Nouvelle recette'></input></a></td></tr>";

echo"<div style='margin:30px'></div>";

$reqlisterecette=mysqli_query($connect,"select * from auto ") or die ("Erreur de selection");



echo "<table border=5> <th>Noserie</th> <th>Marque</th> <th>Modele</th> <th>Disponible </th><th>Prix</th>

<th>Photo</th> <th>Maj</th><th>Sup</th>";
	while($reqresultat=mysqli_fetch_row($reqlisterecette))
	{
		$listenoserie=$reqresultat[0];
		$listemarque=$reqresultat[1];
		$listemodele=$reqresultat[2];
		$listedispo=$reqresultat[3];
		$listeprix=$reqresultat[4];
		$listephoto=$reqresultat[5];	
		
	
		
		if($listenoserie==$idrecette)
		{
			echo "<tr>
			
	
			<td><input name='noserie' value='$listenoserie'></td>
			<td><input name='marque' value='$listemarque'></td>
			<td><input name='modele' value='$listemodele'></td>
			<td><input name='disponible' value='$listedispo'></td>
			<td><input name='prix' value='$listeprix'></td>
			<td><input name='photo' value='$listephoto' ></td>
			<td><input name='idmembre' value='$listeidmembre'></td>
			<td><input type='submit' name='update' value='Maj'></td>
			
				</tr>";
		}
		
		else
		{
		
		echo "<tr> <td>$listenoserie</td> <td>$listemarque</td> <td>$listemodele</td> <td>$listedispo</td>
	
   <td>$listeprix $</td> <td><img src='photo/$listephoto' style='height:100px;width:100px'></img></td>
	<td><a href='admin.php?lien=adminauto&idrecette=$listenoserie&oper=Maj'> Maj </a></td>
	<td><a href='admin.php?lien=adminauto&idrecette=$listenoserie&oper=Sup'> Sup </a></td> 
 	

	</tr>";	
	
		}	
	}
		
echo "</table>";
echo"</form>";
	
?>