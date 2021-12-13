<?php
session_start(); ?>

<?php
        $dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
        $username = 'root';
        $password = '';
        $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
       
        if(isset($_POST)){
        $email =  $_POST["email"];
        $motDePasse =  $_POST["motDePasse"];
        $nom = $_POST["nom"];
        $prenom = $_POST["nom"];
        $ville = $_POST["ville"];
        $adresse =  $_POST["adresse"];
        $telephone = $_POST["telephone"];

        $sql="INSERT INTO clients(email, motDePasse, nom, prenom, ville, adresse, telephone)
        VALUES (";
        $sql=$sql."'".$email."', '".$motDePasse."','".$nom."','".$prenom."', '".$ville."', '".$adresse."', '".$telephone."');";

        $sth = $dbh->prepare($sql);
        $sth->execute();
        $_SESSION['email']=$email;
}
        ?>

