<?php
session_start(); ?>
<html>
<body>
<?php
        $dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
        $username = 'root';
        $password = '';
        $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

        $dateCommande = $_POST[getdate()];
        $email =  $_POST["email"];
        $etat =  $_POST["etat"];
        $nom =  $_POST["nom"];
        $marque =  $_POST["marque"];
        $prix =  $_POST["prix"];

        $sql="INSERT INTO commandes(dateCommande, email, etat, nom, marque, prix) VALUES(";
        $sql=$sql."'".$dateCommande."','".$email."', 'paiement confirmé', '".$nom."',,'".$marque."',,'".$prix."',);";
        $sth = $dbh->prepare($sql);
        $sth->execute();

        $commandes = $sth->fetchAll();

        $dateCommande=$commandes[0]['dateCommande'];
        $nom=$email[0]['email'];
        $nom=$commandes[0]['nom'];
        $marque=$commandes[0]['marque'];
        $prix=$commandes[0]['prix'];
        echo "<li> Email :".$email."<br/>Date de commande :".$dateCommande."<br/>Nom du Produit : ".$nom."<br/>Marque :".$marque."<br/>Prix : ".$prix."</li>";
?>