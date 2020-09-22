<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script >
<script type="text/javascript" src="fonctions.js"></script >

<div style="float:left">
<img src="photo/auto10.PNG" style="margin-left:40px; margin-top:40px"></img>

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
	<form method="post" id="formlogin">
		<table>
			<tr><td>Prenom</td><td><input type='text' name='prenomnewmembre'> </input></td></tr>
			<tr><td>Nom</td><td><input type='text' name='nomnewmembre'> </input></td></tr>
			<tr><td>Email</td><td><input type='text' name='emailmembre'> </input></td></tr>
			<tr><td>Telephone</td><td><input type='text' name='telmembre'> </input></td></tr>
			<tr><td>Login</td><td><input type="text" name="loginmembre"> </input></td></tr>
			<tr><td>Password</td><td><input type="password" name="passwordmembre"> </input></td></tr>
			<!--<tr><td><input type="submit" name="entrermembre" value="Inscription"> </input></td>-->
			<tr><td><input type="button" name="entrermembre" value="Entrez" onclick='insertnewclient();'> </td>  </tr>
		</table>
		
	</form>

</div>