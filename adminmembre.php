<h2>Liste des clients</h2>

<?php

include("connect.php");
	/*Debut:: Mise a jour des donnes       */
		
		if (isset($_POST["update"]))
		{
			//1--Recuperation des donnees a mettre a jour
			$idmembremaj=$_POST["id_client"];
			
			
			$nommaj=$_POST["nom"];
			$prenommaj=$_POST["prenom"];
			$telmaj=$_POST["tel"];
			$emailmaj=$_POST["email"]; 
			
			//2--Requete de mise a jours
			$reqmiseajour=mysqli_query($connect,"update client set prenom='$prenommaj',nom='$nommaj',telephone='$telmaj',email='$emailmaj'
			where code='$idmembremaj'") or die ("Erreur de update");
		
			//3--Analyse et affichage des resultats de la requete
			$nbremaj=mysqli_affected_rows($connect);
			if($nbremaj>0)
			{
				echo "Mise a jour ok!";
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
				$idclient=$_GET["idclient"];
			break;
			
			case "Sup":
				$supidclient=$_GET["idclient"];
					//Requete de suppression
					$reqsupclient=mysqli_query($connect,"delete from client where code='$supidclient'") or die ("Erreur de suppression");
					
					$nbresup=mysqli_affected_rows($connect);
					if($nbresup > 0)
					{
						echo "Suppression de " . $supidclient . " reussi!";
					}
					
					else
					{
						echo "Echec de suppression";
					}
			break;
		}
	
	}

	else 
	{
		$idclient='';
	}
//Liste de clients
//1--Connexion deja etablie
//2--
echo "<form method='post'>";

$reqlisteclient=mysqli_query($connect,"select * from client") or die ("Erreur de selection");

echo "<table border=1> <th>Code</th> <th>Prenom</th> <th>Nom</th><th>Email</th> <th>Telephone</th>
    <th>Maj</th><th>Sup</th>";
	while($reqresultat=mysqli_fetch_row($reqlisteclient))
	{
		$listecode=$reqresultat[0];
		$listeprenom=$reqresultat[1];
		$listenom=$reqresultat[2];
		$listeemail=$reqresultat[3];
		$listetel=$reqresultat[4];
		
		if($listecode==$idclient)
		{
			echo "<tr>
			
			<td><input name='id_client' value='$listecode'></td>
			<td><input name='prenom' value='$listeprenom'></td>
			<td><input name='nom' value='$listenom'></td>
			<td><input name='email' value='$listeemail'></td>
			<td><input name='tel' value='$listetel'></td>
			<td><input type='submit' name='update' value='Maj'></td>
			
				</tr>";
		}
		
		else
		{
		
		echo "<tr> <td>$listecode</td> <td>$listeprenom</td> <td>$listenom</td> <td>$listeemail</td> <td>$listetel</td>
	
	<td><a href='admin.php?lien=adminmembre&idclient=$listecode&oper=Maj'> Maj </a></td>
	<td><a href='admin.php?lien=adminmembre&idclient=$listecode&oper&oper=Sup'> Sup </a></td> 

	</tr>";	
	
		}	
	}
		
echo "</table>";
echo"</form>";
	
?>