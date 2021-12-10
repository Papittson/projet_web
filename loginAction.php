<html>

<body>
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
                $sqlGetMotDePasse = "SELECT motDePasse from clients where email='" . $email . "';";
                $sth = $dbh->prepare($sqlGetMotDePasse);
                $sth->execute();
                $resultMotDePasse = $sth->fetchAll();
                $realMotDePasse=$resultMotDePasse[0]['motDePasse'];
                if(strcmp($motDePasse,$realMotDePasse)==0){
                        echo "Connexion Réussie !";
                }else{
                        echo "Mot de passe incorrect";
                }
                
               
        }





       
       /* if ($_SERVER [$REQUEST_METHOD] == "POST") {
                $email [$REQUEST(email)];
                echo $email;
        }*/