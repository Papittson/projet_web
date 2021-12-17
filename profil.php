<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="stylesheet.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0a7077b38f.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div onclick="location.href='rechercheProduits.php'"><i class="fas fa-home"></i></div>
<div><i class="fas fa-shopping-basket clickable" onclick="location.href='panier.php'"></i></div>
<div class="clickable" onclick="location.href='historiqueCommandes.php'">Historique des commandes</div>
<?php
        $dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
        $username = 'root';
        $password = '';
        $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
        $sql="SELECT nom,prenom,adresse,ville,telephone from clients where email='".$_SESSION['email']."';";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll();
        $info=[];
        
        foreach($result[0] as $key => $value){
            $info[$key]=$value;
        }
        ?>
<p> Votre nom : <?php echo $info['nom']?> <br/>
Votre prénom : <?php echo $info['prenom']?> <br/>
Votre email : <?php echo $_SESSION['email']?> <br/>
Votre adresse : <?php echo $info['adresse']." , ".$info['ville']?> <br/> 
Votre numéro de téléphone : <?php echo $info['telephone']?> <br/></p>
        
</body>
</html>