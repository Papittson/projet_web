<?php
session_start(); ?>
<html>
    <head>
        <title>Créer un compte</title>
        <link rel="stylesheet" href="stylesheet.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <link rel="stylesheet" href="stylesheet.css" />
     <script src="fonctions.js"></script>
    <body>
        <form action = "creationComptePost.php" method = "post">
            <h3>Créer un compte</h3>
            <label for = "email">Email : </label></br>
            <input type = "text" id = "email" name = "email"></br>
            <label for = "password">Mot de passe : </label></br>
            <input type = "password" id = "motDePasse" name = "motDePasse"></br>         
            <label for = "nom">Nom : </label></br>
            <input type = "text" id = "nom" name = "nom"></br>
            <label for = "nom">Prénom : </label></br>
            <input type = "text" id = "nom" name = "nom"></br>
            <label for = "adresse">Adresse : </label></br>
            <textarea id = "adresse" name = "adresse" rows = "3" cols = "16"></textarea></br>            
            <label for = "ville">Ville : </label></br>
            <input type = "text" id = "ville" name = "ville"></br>
            <label for = "telephone">Téléphone : </label></br>
            <input type = "text" id = "telephone" name = "telephone"></br>
            <input type="submit" value = "OK" onclick="inscription();">
        </form>
    </body>
</html>
