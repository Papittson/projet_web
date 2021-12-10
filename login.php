<html>
    <head>
        <title>Connexion</title>
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
