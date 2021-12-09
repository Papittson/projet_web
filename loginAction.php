<html>
<body>
<?php
        $dsn = 'mysql:host=localhost:3306;dbname=technoweb;charset=UTF8';
        $username = 'root';
        $password = '';
        $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

        if ($_SERVER [$REQUEST_METHOD] == "POST") {
                $email [$REQUEST(email)];
                echo $email;
        }