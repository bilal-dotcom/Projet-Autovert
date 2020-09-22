<?php
//Demarrer la session
session_start();
$id=$_GET["id"];
$qte=$_GET["qte"];
$_SESSION['panier'][$id]=$qte;
//Redirection vers la page d'accueil
header('location:test.php');
?>