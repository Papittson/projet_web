<html>
    <head>
        <title>Connexion</title>
    </head>
    <style>
        body {
            text-align: center;
            font-family: Calibri;
        }

    </style>
    <body>
        <form action = "loginAction.php" method = "post">
            <h3>Connexion</h3>
            <label for = "email">Email : </label><br>
            <input type = "text" id = "email" name = "email"><br>
            <label for = "nom">Mot de passe : </label><br>
            <input type = "password" id = "motDePasse" name = "motDePasse"><br><br>
            <input type="submit" value = "OK">
        </form>
    </body>
</html>