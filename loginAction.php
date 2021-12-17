<?php

session_start(); ?>
        <?php
        $dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
        $username = 'root';
        $password = '';
        $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

        $email = $_POST['email'];
        $motDePasse = $_POST['motDePasse'];

        $sqlGetEmails = "SELECT email from clients";
        $sth = $dbh->prepare($sqlGetEmails);
        $sth->execute();
        $resultEmails = $sth->fetchAll();

        $emailList = [];
        foreach ($resultEmails as $enr) {
                $emailList[] = $enr['email'];
        }
        if (in_array($email, $emailList)) {
                $sqlGetMotDePasse = "SELECT nom,prenom,motDePasse from clients where email='" . $email . "';";
                $sth = $dbh->prepare($sqlGetMotDePasse);
                $sth->execute();
                $resultNomMdP = $sth->fetchAll();
                $realMotDePasse=$resultNomMdP[0]['motDePasse'];
                if(strcmp($motDePasse,$realMotDePasse)==0){
                        $returnContent=array("nom"=>$resultNomMdP[0]['nom'],"prenom"=>$resultNomMdP[0]['prenom']);
                        $_SESSION['email']=$email;       
                }else{
                        echo "wrong_password";
                }
                
               
        }else{
                echo "no_account";
        }




