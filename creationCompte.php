<html>
<body>
<?php
        $dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
        $username = 'root';
        $password = '';
        $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
        
        $sth->execute(array(
            $email =  $_POST["email"],
            $motDePasse = $email =  $_POST["motDePasse"],
            $nom = $_POST["nom"],
            $prenom = $_POST["nom"],
            $ville = $_POST["ville"],
            $adresse =  $_POST["adresse"],
            $telephone = $_POST["telephone"] ));

        $sth = $dbh->prepare("(INSERT INTO clients ('email', 'motDePasse', 'nom', 'prenom', 'ville', 'adresse', 'telephone)
        VALUES (".$email.", ".$motDePasse.", ".$nom.", "$.prenom.", ".$ville.", ".$adresse.", ".$telephone.");");
        ?>

<!-- TEST -->
Name: <?php echo $_POST["nom"]; ?><br>
Email address: <?php echo $_POST["email"]; ?>
</body>
</html> 
