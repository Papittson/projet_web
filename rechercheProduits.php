<?php
session_start(); ?>
<!-- $_SESSION tableau superglobal-->

<!DOCTYPE html>

<head>
  <title> Recherche </title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="stylesheet.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://kit.fontawesome.com/0a7077b38f.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<body>

  <?php
  $dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8'; //dsn pour Data Source Name, la chaine de cararctere indique ou est le SGBD, encodage utf8
  $username = 'root';
  $password = '';
  $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
  ?>
  <div class="container">
    <div class="subcontainer">
      <div class="searchBar">
       
        <form>
          <select name="marque" id="listeMarque" onchange="synchronizeList('marque');">
            <option value="" disabled selected hidden> --Choisissez une marque-- </option>
            <?php
            $sql = "SELECT distinct marque FROM produits;";
            $sth = $dbh->prepare($sql);
            $sth->execute();
            $resMarque = $sth->fetchAll();
            foreach ($resMarque as $enr) {
              echo "<option value =\"" . $enr['marque'] . "\">" . $enr['marque'] . "</option>";
            }
            ?>
          </select>



          <select name="categorie" id="listeCategorie" onchange="synchronizeList('categorie');">
            <option value="" disabled selected hidden>--Choisissez une catégorie--</option>
            <?php
            $sql = "SELECT distinct categorie FROM produits;";
            $sth = $dbh->prepare($sql);
            $sth->execute();
            $resCat = $sth->fetchAll();
            foreach ($resCat as $enr) {
              echo "<option value =\"" . $enr['categorie'] . "\">" . $enr['categorie'] . "</option>";
            }
            ?>
          </select>
          <label class="prixTitle" onchange="synchronizeList('categorie')">Prix Max</label>
          <input type="number" id="prix" name="prix" min=0 max=1000 onchange="synchronizeList('prix')">

          <input type="text" id="nom" placeholder="Entrez le nom du produit" onchange="synchronizeList('nom')">

          <button type='button' onclick="resetFilters();"> Réinitialiser les filtres </button>

          <i class="fas fa-search clickable" onclick="synchronizeList('nom')"></i>

        </form>
      </div>

      <div class="loginSigninButtonCart">
        <i class="fas fa-shopping-basket clickable" onclick="location.href='panier.php'"></i>
        <?php if (isset($_SESSION['email'])) {
          $sql = "SELECT nom,prenom from clients where email='" . $_SESSION['email'] . "';";
          $sth = $dbh->prepare($sql);
          $sth->execute();
          $result = $sth->fetchAll();
          $info = [];

          foreach ($result[0] as $key => $value) {
            $info[$key] = $value;
          }
          echo "<i class=\"fas fa-user-circle\" onclick=location.href=\"profil.php\"></i><p > Bienvenue " . $info['nom'] . " " . $info['prenom'] . "</p>";
        } else {
          echo " <button type='button' class=\"signinButton\" onclick=\"location.href='creationCompte.php'\">S'inscrire</button>
          <button type='button' onclick=\"location.href='login.php'\">Se connecter</button> ";
        } ?>

      </div>

    </div>
    <div class="resultsBG">
      <div class="results clickable" id="listeResultats">
        
      </div>
    </div>

  </div>


  <script src="fonctions.js"></script>
  <script src="filtrage.js"></script>
</body>

</html>