function resetFilters(){
    document.getElementById("listeMarque").value="";
    document.getElementById("listeCategorie").value="";
    document.getElementById("prix").value="";
}

var email = document.getElementById("email").value;
var motDePasse = document.getElementById("motDePasse").value;
var nom = document.getElementById("nom").value;
var prenom=document.getElementById("prenom").value;
var ville=document.getElementById("ville").value;
var adresse=document.getElementById("adresse").value;
var telephone=document.getElementById("telephone").value;

var data = { "email" : email, "motDePasse" : motDePasse,"nom":nom,"prenom":prenom,"ville":ville,"adresse":adresse,"telephone":telephone};

function inscription(data){
    var XHR = new XMLHttpRequest();
  var urlEncodedData = "";
  var urlEncodedDataPairs = [];
  var name;

  // Transformez l'objet data en un tableau de paires clé/valeur codées URL.
  for(name in data) {
    urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
  }

  // Combinez les paires en une seule chaîne de caractères et remplacez tous
  // les espaces codés en % par le caractère'+' ; cela correspond au comportement
  // des soumissions de formulaires de navigateur.
  urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

  // Définissez ce qui se passe en cas de succès de soumission de données
  XHR.addEventListener('load', function(event) {
    alert('Ouais ! Données envoyées et réponse chargée.');
  });

  // Définissez ce qui arrive en cas d'erreur
  XHR.addEventListener('error', function(event) {
    alert('Oups! Quelque chose s\'est mal passé.');
  });

  // Configurez la requête
  XHR.open('POST', 'creationComptePost');

  // Ajoutez l'en-tête HTTP requise pour requêtes POST de données de formulaire
  XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Finalement, envoyez les données.
  XHR.send(urlEncodedData);
}