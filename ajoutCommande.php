<?php
session_start();
echo json_encode($_SESSION['panier']);

$dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
$username = 'root';
$password = '';
$dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

$dateCommande = date("Y-m-d H:i:s");
$email =  $_SESSION["email"];
$sql="INSERT INTO commandes(dateCommande, email, etat) VALUES ('".$dateCommande."','".$email."', 'paiement confirmé');";

$sth = $dbh->prepare($sql);
$sth->execute();
$sqlSelect="SELECT idCommande,dateCommande,etat from commandes where email='".$email."';";
$sthSelect = $dbh->prepare($sqlSelect);
$sthSelect->execute();
$commandes = $sthSelect->fetchAll();


$idCommande=$commandes[0]['idCommande'];
$dateCommande=$commandes[0]['dateCommande'];
$etat=$commandes[0]['etat'];

foreach($_SESSION['panier'] as $identifiant => $quantite){
        $getPrice="SELECT prix FROM produits where idProduit='".$identifiant."';";
        $sthPrice = $dbh->prepare($getPrice);
        $sthPrice->execute();
        $res = $sthPrice->fetchAll();
        $prix=$res[0]['prix'];
        $montant=$prix*$quantite;
        $sql="INSERT INTO lignescommandes(idCommande, idProduit, quantite,montant) VALUES ('".$idCommande."','".$identifiant."', '".$quantite."','".$montant."');";
        echo $sql;
        $sth = $dbh->prepare($sql);
        $sth->execute();
}
$_SESSION['panier']=[];

?>