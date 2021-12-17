<?php
session_start();


$dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
$username = 'root';
$password = '';
$dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

$idCommande = $_GET['idCommande'];

$sql = "SELECT idProduit,montant,quantite from lignescommandes where idCommande='" . $idCommande . "';";
$sth = $dbh->prepare($sql);
$sth->execute();
$lignesCommande = $sth->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail de commande</title>
    <link rel="stylesheet" href="stylesheet.css" />
    <script src="fonctions.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/0a7077b38f.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<div onclick="location.href='rechercheProduits.php'"><i class="fas fa-home"></i></div>
<div onclick="location.href='profil.php'"><i class="fas fa-user-circle"></i></div>
  

    <?php

    foreach ($lignesCommande as $produit) {
        $idProduit = $produit['idProduit'];
        $montant = $produit['montant'];
        $quantite = $produit['quantite'];
        $sql = "SELECT nom,photo from produits where idProduit='" . $idProduit . "';";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $produitInfo = $sth->fetchAll();
        $nom = $produitInfo[0]['nom'];
        $photo = $produitInfo[0]['photo'];
        echo "<div class=\"clickable\" onclick=\"location.href='pageAffichageProduit.php?idProduit=" . $idProduit . "'\">" . $nom . "<br/> Montant : " . $montant . "€<br/> Quantite : " . $quantite . "<br/><img src='" . $photo . "'></div>";
    }

    ?>

</body>

</html>