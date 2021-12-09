<html>
    <head>
        <title>Créer un compte</title>
    </head>
    <style>
        body {
            text-align: center;
            font-family: Calibri;
        }

    </style>
    <body>
        <form action = "creationComptePost.php" method = "post">
            <h3>Créer un compte</h3>
            <label for = "nom">Nom : </label></br>
            <input type = "text" id = "nom" name = "nom"></br>
            <label for = "email">Email : </label></br>
            <input type = "text" id = "email" name = "email"></br>
            <label for = "nom">Mot de passe : </label></br>
            <input type = "password" id = "motDePasse" name = "motDePasse"></br>         
            <label for = "nom">Adresse : </label></br>
            <textarea id = "adresse" name = "adresse" rows = "3" cols = "16"></textarea></br>            
            <label for = "nom">Ville : </label></br>
            <input type = "text" id = "ville" name = "ville"></br>
            <label for = "nom">Téléphone : </label></br>
            <input type = "text" id = "telephone" name = "telephone"></br>
            <input type="submit" value = "OK">
        </form>
    </body>
</html>
