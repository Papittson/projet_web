function resetFilters() {
  document.getElementById("listeMarque").value = "";
  document.getElementById("listeCategorie").value = "";
  document.getElementById("prix").value = "";
  synchronizeList('categorie');
}

/***************************************************************************************/

function inscription() {
  var email = document.getElementById("email").value;
  var motDePasse = document.getElementById("motDePasse").value;
  var nom = document.getElementById("nom").value;
  var prenom = document.getElementById("prenom").value;
  var ville = document.getElementById("ville").value;
  var adresse = document.getElementById("adresse").value;
  var telephone = document.getElementById("telephone").value;
  var data = {
    email: email,
    motDePasse: motDePasse,
    nom: nom,
    prenom: prenom,
    ville: ville,
    adresse: adresse,
    telephone: telephone,
  };

  var XHR = new XMLHttpRequest();
  var urlEncodedData = "";
  var urlEncodedDataPairs = [];
  var name;

  for (name in data) {
    urlEncodedDataPairs.push(
      encodeURIComponent(name) + "=" + encodeURIComponent(data[name])
    );
  }

  urlEncodedData = urlEncodedDataPairs.join("&").replace(/%20/g, "+");
  XHR.open("POST", "creationComptePost.php");
  XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  XHR.send(urlEncodedData);
  XHR.onload = function(){
    window.location.href = "profil.php";
  };
 
}

/***************************************************************************************/

function connexion() {
  var email = document.getElementById("email").value;
  var motDePasse = document.getElementById("motDePasse").value;
  var data = { email: email, motDePasse: motDePasse };
  var XHR = new XMLHttpRequest();
  var urlEncodedData = "";
  var urlEncodedDataPairs = [];
  var name;
  for (name in data) {
    urlEncodedDataPairs.push(
      encodeURIComponent(name) + "=" + encodeURIComponent(data[name])
    );
  }
  urlEncodedData = urlEncodedDataPairs.join("&").replace(/%20/g, "+");
  
  XHR.open("POST", "loginAction.php");
  XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  XHR.send(urlEncodedData);
  XHR.onload = function(){
    console.log(this.responseText);
    if(this.responseText.trim()=="wrong_password"){
      alert("Mot de passe incorrect !");
    }else if(this.responseText.trim()=="no_account"){
      alert("Aucun email correspondant");
    }else{
    window.location.href = "profil.php";}
  };
}

/***************************************************************************************/

function paiement() {
  var XHR = new XMLHttpRequest();
  XHR.open("GET", "ajoutCommande.php");
  XHR.send();
  XHR.onload = function () {
    console.log("BOOOOOB : " + this.responseText);
    if (this.responseText == "true") {
      location.href = "historiqueCommandes.php";
    }else{
      location.href = "login.php";
    }
  };
}
