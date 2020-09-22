
<form method="post">
	<table>
	<tr><td>Login</td><td><input type="text" name="login"> </input></td></tr>
	<tr><td>Password</td><td><input type="password" name="password"> </input></td></tr>
	<tr><td><input type="submit" name="entrer" value="Entrer"> </input></td></tr>
	</table>
</form>

<?php

//echo sha1('admin');

if(isset($_POST["entrer"]))
{
	$login=$_POST["login"];
	$password=sha1($_POST["password"]);
	
	//echo $password;
	
	include("connect.php");
	
	$reqadmin=mysqli_query($connect,"select * from administration where login='$login' and password='$password'");
	
	$nbre=mysqli_num_rows($reqadmin);
	
	echo $nbre;
}

?>