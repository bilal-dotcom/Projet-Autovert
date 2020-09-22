
<div>

	<h3> Inscription de nouvelles recettes! </h3>
	<form  enctype="multipart/form-data"  method="post">
		<table>
			<tr><td>Noserie</td><td><input type='text' name='noserie'> </input></td></tr>
			<tr><td>Marque</td><td><input type='text' name='marque'> </input></td></tr>
			<tr><td>Modele</td><td><input type='text' name='modele'> </input></td></tr>
			<tr><td>Prix</td><td><input type="text" name="prix"> </input></td></tr>
	     	 <tr><td>Photo </td><td><input type="file" name="uploaded_file"></input></td></tr>
			<tr><td><input type="submit" name="entrerauto" value="Inscription auto"> </input></td>
		

		
			<?php
				
				include("connect.php")		;	

  if(!empty($_FILES['uploaded_file']))
  {
	  
	   $photo=$_FILES['uploaded_file']['name'];
	  
   $path = "photo/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }

				
				
				if (isset($_POST["entrerauto"]))
				{
					
					$noserie=($_POST['noserie']);
					$marque=($_POST['marque']);
					$modele=($_POST['modele']);
					$prix=($_POST['prix']);
					
					
					if($noserie=='')
					{
						echo"Veuillez entrer un numero de serie";
					}
					else if($marque=='')
					{
						echo"Veuillez entrer une marque";
					}
					else if($modele=='')
					{
						echo"Veuillez entrer un modele";
					}
					else if($prix=='')
					{
						echo"Veuillez entrer un prix";
					}
			
					else if($photo=='')
					{
						echo"Veuillez entrer la photo";
					}
					
					else{
						
					$insertion=mysqli_query($connect,"insert into auto VALUES
					('$noserie','$marque','$modele',0,'$prix','$photo')") or die ("Erreur d'insertion");
		
		$nbre= mysqli_affected_rows($connect);
			if ($nbre>0)
			{
				
				echo "L'insertion de  $marque  a ete effectuer";
				
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