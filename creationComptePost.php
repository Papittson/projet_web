<html>
<style>
        body {
            text-align: center;
            font-family: Calibri;
        }

    </style>
<body>
<?php
        $dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8'; //dsn pour Data Source Name, la chaine de cararctere indique ou est le SGBD, encodage utf8
        $username = 'root';
        $password = '';
        $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

        $sth = $dbh->prepare("(INSERT INTO clients ('nom', 'email', 'password', 'ville', 'adresse', 'telephone)
        VALUES ($nom, $email, $password, $ville, $adresse, $telephone);")
        $sth->execute(array(
            $nom = $_POST["nom"]
            $email =  $_POST["email"]
            $ville = $_POST["ville"]
            $adresse =  $_POST["adresse"]
            $telephone = $_POST["telephone"] ));
        
        ?>


Welcome <?php echo $_POST["nom"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
</body>
</html> 