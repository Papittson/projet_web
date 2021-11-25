<?php session_start();?> <!-- $_SESSION tableau supreglobal--> 
<html>
  <head>
    <title> recherche </title>
      <meta charset="UTF-8" />
  </head>
  <h3> RECHERCHE </h3>
  <body>
    <?php
    $dsn = 'mysql:host=localhost:3306;dbname=bd_hai726i;charset=UTF8'; //dsn pour Data Source Name, la chaine de cararctere indique ou est le SGBD, encodage utf8
    $username = 'root';
    $password = '';
    $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
    ?>

    <form>
    <select name="marque"> 
      <option value=""> --choisissez une marque-- </option>
    <?php
    $sql="SELECT distinct marque FROM produits;";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $res= $sth->fetchAll();
    foreach($res as $enr){
        echo"<option value =\"marque\">".$enr['marque']."</option>";
    }
    ?>
    </select>

    <select name="categorie"> 
    <?php
    $sql="SELECT distinct categorie FROM produits;";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $res= $sth->fetchAll();
    foreach($res as $enr){
        echo"<option value=\"categorie\">".$enr['categorie']."</option>";
    }
    ?>
    </select>
    </form>
    
  </body>
</html>
