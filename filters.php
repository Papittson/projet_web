<?php

session_start(); ?>

<?php
$dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8'; //dsn pour Data Source Name, la chaine de cararctere indique ou est le SGBD, encodage utf8
$username = 'root';
$password = '';
$dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");



$sql="SELECT * FROM produits";
$sqlFiltersMarque="SELECT distinct marque from produits";
$sqlFiltersCategorie="SELECT distinct categorie from produits";
$checkFilters= false;

if( preg_match('/\S/', $_GET['marque'])){
    $brand=$_GET['marque'];
    $sql=$sql." WHERE marque='".$brand."'";
    $sqlFiltersCategorie=$sqlFiltersCategorie." WHERE marque='".$brand."'";
  $checkFilters= true;
}

if(preg_match('/\S/', $_GET['categorie'])){
    $category=$_GET['categorie'];
    if($checkFilters){
        $sql=$sql." AND categorie='".$category."'";
    }else{
        $sql=$sql." WHERE categorie='".$category."'";
        $checkFilters=true;
    }
    $sqlFiltersMarque=$sqlFiltersMarque." WHERE categorie='".$category."'";
}

if(preg_match('/\S/', $_GET['prix'])){
    $prix=$_GET['prix'];
    if($checkFilters){
        $sql=$sql." AND prix<='".$prix."'";
    }else{
        $sql=$sql." WHERE prix<='".$prix."'";
    }
}


$sth = $dbh->prepare($sql);
$sth->execute();
$result = $sth->fetchAll();

$sqlFiltersMarque=$sqlFiltersMarque.";";
$sthFiltersMarque = $dbh->prepare($sqlFiltersMarque);
$sthFiltersMarque->execute();
$resultFiltersMarque = $sthFiltersMarque->fetchAll();

$sqlFiltersCategorie=$sqlFiltersCategorie.";";
$sthFiltersCategorie = $dbh->prepare($sqlFiltersCategorie);
$sthFiltersCategorie->execute();
$resultFiltersCategorie = $sthFiltersCategorie->fetchAll();


$response=array('produits'=>$result,'marques'=>$resultFiltersMarque,'categories'=>$resultFiltersCategorie);

echo JSON_encode($response);


?>
