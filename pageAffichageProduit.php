

<?php 

session_start();
$idProduit=$_GET['idProduit'];
$dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
$username = 'root';
$password = '';
$dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

$sql="SELECT nom,marque,description,photo,prix from produits where idProduit='".$idProduit."'; ";
$sth = $dbh->prepare($sql);
$sth->execute();
$resPdt = $sth->fetchAll();
$nom=$resPdt[0]['nom'];
$prix=$resPdt[0]['prix'];
$description=$resPdt[0]['description'];
$photo=$resPdt[0]['photo'];

$marque=$resPdt[0]['marque'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><?php echo $nom; ?></br>
<?php echo $description; ?></br>
<?php echo $prix; ?> €</br>
<?php echo $marque; ?></br>
<img src="<?php echo $photo;?>"/>
<form method="POST" action="panier.php">
<button name="idProduit" id="addToCartButton" value="<?php echo $idProduit;?>">Ajouter au panier</button>

<input  name="quantite" id="qty" type="number" value="1" step="1" max="10" min="1"/>

</form>
</p>

<script src="fonctions.js"></script>
</body>
</html>