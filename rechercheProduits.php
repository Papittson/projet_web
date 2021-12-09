<?php session_start(); ?>
<!-- $_SESSION tableau superglobal-->

<!DOCTYPE html>

<head>
  <title> Recherche </title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="stylesheet.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
<div class="searchBar">
<h3 class="titleRecherche"> RECHERCHE </h3>
  <form>
    <select name="marque" id="listeMarque" onchange="synchronizeList('marque');">
      <option value="" disabled selected hidden> --Choisissez une marque-- </option>
      <?php
      $sql = "SELECT distinct marque FROM produits;";
      $sth = $dbh->prepare($sql);
      $sth->execute();
      $resMarque = $sth->fetchAll();
      foreach ($resMarque as $enr) {
        echo "<option value =\"".$enr['marque']."\">" . $enr['marque'] . "</option>";
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
        echo "<option value =\"".$enr['categorie']."\">" . $enr['categorie'] . "</option>";
      }
      ?>
    </select>
    <label class="prixTitle"onchange="synchronizeList('categorie')">Prix</label>
    <input type="number" id="prix" name="prix"
         min=0
         max=1000>

    <button type='button' onclick="resetFilters();"> Réinitialiser les filtres </button>
    <button class="searchButton"> Rechercher</button>
  </form>
  </div>

  <div class="resultsBG"> 
    <p class="results">Résultats :
      <ul id="listeResultats">

      </ul>
      </p>
  </div>

  <script src="fonctions.js"></script>
<script src="filtrage.js"></script>
</body>

</html>