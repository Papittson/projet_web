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

        $sql="INSERT INTO commandes(dateCommande, email, etat, nom, marque, prix) VALUES(";
        $sql=$sql."'".$dateCommande."','".$email."', 'paiement confirmé');";
        $sth = $dbh->prepare($sql);
        $sth->execute();

        $commandes = $sth->fetchAll();

        $dateCommande=$commandes[0]['dateCommande'];
        $email=$commandes[0]['email'];
        $etat=$commandes[0]['etat'];
        echo "<li> Email :".$email."<br/>Date de commande :".$dateCommande."<br/>Etat de la Commande : ".$etat."</li>";
        echo "test : ".$_SESSION['panier'];
?>