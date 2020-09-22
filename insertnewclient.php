
<div style="float:left">
<img src="photo/sushi.PNG" style="margin-left:40px; margin-top:40px"></img>

</div>


<div>

<?php

include("connect.php");

function test_input($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	
}



?>

	<h3> Inscription de nouveaux clients! </h3>
	<form method="post">
		<table>
			<tr><td>Nom</td><td><input type='text' name='nomnewmembre'> </input></td></tr>
			<tr><td>Preom</td><td><input type='text' name='prenomnewmembre'> </input></td></tr>
			<tr><td>Telephone</td><td><input type='text' name='telmembre'> </input></td></tr>
			<tr><td>Email</td><td><input type='text' name='emailmembre'> </input></td></tr>
			<tr><td>Login</td><td><input type="text" name="log"> </input></td></tr>
			<tr><td>Password</td><td><input type="password" name="passwordmembre"> </input></td></tr>
			<tr><td><input type="submit" name="entrermembre" value="Inscription"> </input></td>
			
			<?php
				
				if (isset($_POST["entrermembre"]))
				{
					$nom=($_POST['nomnewmembre']);	
					$prenom=($_POST['prenomnewmembre']);	
					$tel=($_POST['telmembre']);
					$email=($_POST['emailmembre']);
					$passwd=sha1($_POST['passwordmembre']);
					$login=sha1($_POST['log']);
					
					$code=substr($nom,0,3).substr($prenom,0,2);
					
					if($nom=='')
					{
						echo"Veuillez entrer un nom";
					}
					else if($email=='')
					{
						echo"Veuillez entrer un mail";
					}
					else if($passwd=='')
					{
						echo"Veuillez entrer un mot de passe";
					}
					
					else{
						
					$insertion=mysqli_query($connect,"insert into client VALUES
					('$code','$prenom','$nom','$email','$tel','$login','$passwd')") or die ("Erreur d'insertion");
		
		$nbre= mysqli_affected_rows($connect);
			if ($nbre>0)
			{
				
				echo "L'insertion de $nom  a ete effectuer";
				
			}
			else
			{
				echo "Pas marcher";
			}
					}
				}
				
			?>
			
		</table>

</form>

</div>