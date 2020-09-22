<form method="post">

<?php 

echo "<h3>Bienvenue sur la page location pour les locations et les retour</h3>";

  
?>


<div style="float:left;margin-right:50px">

<table>
	<tr><td>Code</td><td><input type="text" name="codeclient" value=""></td></tr>
	<tr><td>Noserie</td><td><input type="text" name="noserie" value=""></td></tr>
	<tr><td>Date de location</td><td><input type="date" name="datelocation" value=""></td></tr>
	<tr><td>Date de retour</td><td><input type="date" name="dateretour" value=""></td></tr>
	<tr><td>Prix location</td><td><input type="text" name="prixlocation" value=""></td></tr>
</table>

<table>
	<tr>
		<td><input type="submit" name="valid" value="Louer"></td>
		<td><input type="submit" name="valid" value="Retourner"></td>
	</tr>	
</table>

<?php

	include("connect.php");
  
	if(isset($_POST["valid"]))
	{
		
		$val=$_POST["valid"];
		
		$code=$_POST["codeclient"];
		$noserie=$_POST["noserie"];
		$datelocation=$_POST["datelocation"];
		$dateretour=$_POST["dateretour"];
		$prix=$_POST["prixlocation"];
		
		
		//Prendre dans la BDA tous les donnes dans la table materiel ou le numero de serie
		//est le meme que celui dans l'input noserie
		//$dispp est la variable avec le 0 ou le 1 de la disponibilite
		
		$select3=mysqli_query($connect,"select * from auto where noserie='$noserie' ");
			
			 while ($ligne = mysqli_fetch_row($select3))
				{
			$dispp=$ligne[3];
				}		
		
		
		
		switch($val)
		{
			
			case 'Louer':
			
			if ($noserie=='')
			{
				echo "Entrez un numero de serie de l'auto";
			}
			else if ($code=='')
			{
				echo "Entrez un code de client";
			}
			else if($datelocation=='')
			{
				echo "Entrez la date de location";
			}
			else if ($prix=='')
			{
				echo "Entrez le prix";
			}
			
			//Si la disponibilite est 0, donc l'auto n'est pas preter
			//J'insere dans la table location puis dans la table auto je modifie la disponibilite a 1 
			//Donc la voiture est maintenant louer
			else if($dispp==0)
				{
			
			$select=mysqli_query($connect,"Insert into location 
			VALUES ('$code','$noserie','$datelocation','','$prix')") or die ("Erreur d'insertion");
			
			$select2=mysqli_query($connect,"Update auto set disponible=1 where noserie='$noserie'") or die("Erreur de modif");
		
		$nbre= mysqli_affected_rows($connect);
			if ($nbre>0)
			{
				echo "L'insertion de la location a ete effectuer";
			}
	
				}
				
				//Si la disponibilite est 1, donc le livre est en location
		 else if($dispp==1)
			{
				echo "L'auto est en location";
			}		
	
			
			break;
			
			case 'Retourner':
			
			     if ($noserie=='' )
			          {	
			echo"Entrez un numero de serie de la voiture";
					  }
			else if ($code=='')
			{
				echo "Entrez un code du client";
			}
			else if ($dateretour=='')
				{
					echo"Entrez une date de retour";
				}
			
			else
					{
						
					//Si la disponibilite est 1, donc la voiture est en pret	
					//La location sera alors supprimer
					//La disponibilite de la voiture revient aussi a zero
				if($dispp==1)
			{
				
			  $select4=mysqli_query($connect,"update  location set dateretour='$dateretour' where code='$code' and noserie='$noserie'")or die("Erreur de retour");
			  
			
				$nbre4= mysqli_affected_rows($connect);
				
			if ($nbre4>0)
			{
				 $select6=mysqli_query($connect,"Update auto set disponible=0 where noserie='$noserie'") or die("Erreur de modif");
				echo "L'auto a ete retourner";
			}
			else
			{
				echo "Cette location est incorrecte";
			}
			
			
			}
			
			else if($dispp==0)
			{
				echo "L'auto n'a pas ete preter";
			}
		
					}
					  
			
			break;
			
		}
	}


?>

</div>

<?php
	
//Liste de clients
//1--Connexion deja etablie
//2--

$reqlistepret=mysqli_query($connect,"select * from location") or die ("Erreur de selection");

ECHO "TABLE D'ARCHIVES";

echo "<table border=1> <th>Code</th> <th>No serie</th> <th>Date location</th> <th>Date retour</th>

<th>Prix</th> ";

	while($reqresultat=mysqli_fetch_row($reqlistepret))
	{
		$listecode=$reqresultat[0];
		$listenoserie=$reqresultat[1];
		$listedatelocation=$reqresultat[2];
		$listedateretour=$reqresultat[3];
		$listeprix
		=$reqresultat[4];

		
	echo "<tr> <td>$listecode</td> <td>$listenoserie</td> <td>$listedatelocation</td> <td>$listedateretour</td>
	
  <td>$listeprix $</td>  </tr>";
		
	}
	

echo "</table>";
	
	
	
	
?>


</form>