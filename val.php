<html>
  <head>
    <title> recherche </title>
      <meta charset="UTF-8" />
  </head>
  <h3> RECHERCHE </h3>
  <body>
    <?php
    $dsn = 'mysql:host=mysql.etu.umontpellier.fr;dbname=e20200001936;charset=UTF8'; //dsn pour Data Source Name, la chaine de cararctere indique ou est le SGBD, encodage utf8
    $username = 'e20200001936';
    $password = 'pouetpouet';
    $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
    ?>
    <form>
    <select name="marque"> Marque
    <?php
    $sql="SELECT distinct marque FROM produits;";
    $res=$dbh->$query($sql);
    foreach($res as $enr){
        echo"<option>".$enr['marque']."</option>";
    }
    ?>
    </select>
    <select name="categorie"> Catégorie
    <?php
    $sql="SELECT distinct catégorie FROM produits;";
    $res=$dbh->$query($sql);
    foreach($res as $enr){
        echo"<option>".$enr['catégorie']."</option>";
    }
    ?>
    </select>
    </form>
    
  </body>
</html>
