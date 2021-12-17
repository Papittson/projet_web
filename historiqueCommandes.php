<?php
session_start();


$dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
$username = 'root';
$password = '';
$dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

$dateCommande = date("Y-m-d H:i:s");

$email = $_SESSION['email'];


$sqlSelect = "SELECT idCommande,dateCommande,etat from commandes where email='" . $email . "';";
$sthSelect = $dbh->prepare($sqlSelect);
$sthSelect->execute();
$commandes = $sthSelect->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Commandes</title>
        <link rel="stylesheet" href="stylesheet.css" />
        <script src="https://kit.fontawesome.com/0a7077b38f.js" crossorigin="anonymous"></script>
        <script src="fonctions.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
        <?php
        foreach ($commandes as $commande) {
                echo "<div class=\"clickable\" onclick=\"location.href='detailCommande.php?idCommande=" . $commande['idCommande'] . "'\"> Référence : " . $commande['idCommande'] . "<br/>Etat : " . $commande['etat'] . "<br/>Date :" . $commande['dateCommande'] . " </div>";
        }
        ?>
      <div onclick="location.href='profil.php'"><i class="fas fa-user-circle"></i></div>
  
<div onclick="location.href='rechercheProduits.php'"><i class="fas fa-home"></i></div>

</body>

</html>