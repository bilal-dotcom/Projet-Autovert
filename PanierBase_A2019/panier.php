<?php
//Vider le panier
if(isset($_GET["vider"]))
{
	$_SESSION['panier']='';

	//version recente de PHP
	//$_SESSION['panier']=[];
}
//Verifier si le panier est vide avant de afficher, enlever, confirmer ou vider
if($_SESSION['panier']=='')
{
	echo" Le panier est vide";

}
else
{
	
	//Si on veut enlever un item
	if($_GET['enlever'])
	{
		$enlever=$_GET["enlever"];
		
	}
	//Initialiser le compteur
	$i=0;
	echo "<table border='1'>
	<tr><th>ID </th><th> QTE</th><th> Enlever</th></tr>";
	foreach($panier as $id => $qte):
		//Pour ajouter dans la table les elements confirmer
		if(isset($_GET['confirmer']))
		{
			$confirmer=$_GET['confirmer'];
			//Recuperer le prix de chaque item dans le panier
			$reqid=mysqli_query($conn,"select prix from produits where id='$id'") or die("Erreur de requete!");
			while($reqidresult=mysqli_fetch_row($reqid))
			{
				$prix =$reqidresult[0];
				$idclient=$_SESSION["idclient"];
				//Inserer les items confirmer dans le panier
				$reqconf=mysqli_query($conn,"insert into achats(idclient,id,quantite,prix) values('$idclient',$id,$qte,$prix)");
				
			}
			
		}
		//Pour supprimer un item du panier
		if($id==$enlever or $_GET['confirmer'])
		{
			if($id==$enlever)
			{
				//$_SESSION['panier'][$id]=[];
				unset($_SESSION['panier'][$id]);
			}
			if($_GET['confirmer'])
			{
				//Vider le panier
				$_SESSION['panier']='';
				//version recente de PHP
				//$_SESSION['panier']=[];
				//Confirme l'ajout des items dans vos achats
				$confirmer='true';
			}
		}
		//Afficher les items du panier
		else
		{
			echo "<tr><td>$id</td> <td> $qte</td>
			<td><a href='indexmembre.php?lien=panier&enlever=$id'> Enlever</a></td></tr>";
			$i++;
		}
	endforeach;
	echo "Items dans le panier: $i<tr><td colspan='2'><a href='indexmembre.php?lien=panier&vider=ok'> Vider </a></td>
		 <td> <a href='indexmembre.php?lien=panier&confirmer=ok'> Confirmer </a></td></tr></table>";
	if($confirmer=='true')
	{
		echo "Les items sont ajoutes dans vos achats!";
	}
}
?>