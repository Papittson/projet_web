<?php

session_start(); ?>
<html>
    <head>
        <title>Connexion</title>
        <link rel="stylesheet" href="stylesheet.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <link rel="stylesheet" href="stylesheet.css" />
    <script src="fonctions.js"></script>
    <body>
        <form action = "loginAction.php" method = "post">
            <h3>Connexion</h3>
            <label for = "email">Email : </label><br>
            <input type = "text" id = "email" name = "email"><br>
            <label for = "nom">Mot de passe : </label><br>
            <input type = "password" id = "motDePasse" name = "motDePasse"><br><br>
            <input type="submit" value = "OK" onclick="connexion()">
        </form>
    </body>
</html>
