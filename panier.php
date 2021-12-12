
<?php 

session_start();

if($_POST){

if(empty($_SESSION['panier'])){
    echo "Votre panier est vide";
}
if(in_array($_POST['idProduit'],$_SESSION['panier'])){
    $_SESSION['panier'][$_POST['idProduit']]+=$_POST['quantite'];
}else{
    $_SESSION['panier'][$_POST['idProduit']] = $_POST['quantite'];
}
}
$dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
$username = 'root';
$password = '';
$dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="stylesheet.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<h1>PANIER </h1>
    <ul>
        <?php 
        
        $prixTotal=0;
        
        foreach($_SESSION['panier'] as $identifiant => $quantite){

        $sql="SELECT nom,marque,description,photo,prix from produits where idProduit='".$identifiant."'; ";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $resPdt = $sth->fetchAll();
        
        $nom=$resPdt[0]['nom'];
        $prix=$resPdt[0]['prix'];
        $description=$resPdt[0]['description'];
        $photo=$resPdt[0]['photo'];
        $marque=$resPdt[0]['marque'];
        $prixTotal+=$prix*$quantite;
        echo "<li> Nom du Produit : ".$nom."<br/>Marque :".$marque."<br/>Prix à l'unité : ".$prix."€<br/>Quantite : ".$quantite."<img src=\"".$photo."\"/></li>";
        }
            ?>
    </ul>
    <p> TOTAL : <?php echo $prixTotal ; ?>€ </p>
</body>
</html>

