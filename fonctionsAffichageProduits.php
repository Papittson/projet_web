<?php
$brand=$_GET['marque'];
$dsn = 'mysql:host=localhost:3306;dbname=bd_hai726i;charset=UTF8'; //dsn pour Data Source Name, la chaine de cararctere indique ou est le SGBD, encodage utf8
$username = 'root';
$password = '';
$dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

$sql="SELECT nom,marque,description,photo from produits where marque='".$brand."' and categorie='".$category."'; ";
$sth = $dbh->prepare($sql);
$sth->execute();
$resPdt = $sth->fetchAll();
$produit=array();

?>