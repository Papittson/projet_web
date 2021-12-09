synchronizeList("marque");

function synchronizeList(type) {
  var brandSelected = document.getElementById("listeMarque").value;
  var categorySelected = document.getElementById("listeCategorie").value;
  var priceSelected = document.getElementById("prix").value;

  //On crée un objet XMLHttpRequest
  let xhr = new XMLHttpRequest();
  //On initialise notre requête avec open()
  xhr.open(
    "GET",
    `/filters.php?marque=${brandSelected}&categorie=${categorySelected}&prix=${priceSelected}`
  );
  //On veut une réponse au format JSON
  xhr.responseType = "json";
  //On envoie la requête
  xhr.send();
  //Dès que la réponse est reçue...
  //Les fonctions de callback:
  xhr.onload = function () {
    //Si le statut HTTP n'est pas 200...
    if (xhr.status != 200) {
      //...On affiche le statut et le message correspondant
      alert("Erreur " + xhr.status + " : " + xhr.statusText);
      return null;
      //Si le statut HTTP est 200, on affiche le nombre d'octets téléchargés et la réponse
    } else {

      var result = xhr.response;

      if (type == "marque") {
        $("#listeCategorie").empty();
        var categoryFound = false;
        var categories = result.categories;
        var tag_option_default = document.createElement("option");
        var option_default = document.createTextNode(
          "--Choisissez une catégorie--"
        );
        tag_option_default.value = "";
        tag_option_default.appendChild(option_default);
  
        document.getElementById("listeCategorie").appendChild(tag_option_default);
        for (category of categories) {
          var tag_option = document.createElement("option");
          var option_content = document.createTextNode(category.categorie);
          tag_option.appendChild(option_content);
          document.getElementById("listeCategorie").appendChild(tag_option);

          if(category.categorie == categorySelected) {
            categoryFound = true;
          }
        }

        if(categoryFound) {
          document.getElementById("listeCategorie").value = categorySelected;
        }


      }
      if (type == "categorie") {
       

        $("#listeMarque").empty();

      var brandFound = false;
      var marques = result.marques;
      var tag_option_default_marque = document.createElement("option");
      var option_default_marque = document.createTextNode(
        "--Choisissez une marque--"
      );
      tag_option_default_marque.value = "";
      tag_option_default_marque.appendChild(option_default_marque);
      document
        .getElementById("listeMarque")
        .appendChild(tag_option_default_marque);
      for (brand of marques) {
        var tag_option_marque = document.createElement("option");
        var option_content_marque = document.createTextNode(brand.marque);
        tag_option_marque.appendChild(option_content_marque);
        document.getElementById("listeMarque").appendChild(tag_option_marque);

        if(brand.marque == brandSelected) {
          brandFound = true;
        }
      }

      if(brandFound) {
        document.getElementById("listeMarque").value = brandSelected;
      }

      }
   
      var priceMax = result.priceMax;
      document.getElementById("prix").setAttribute("max", priceMax);


//partie affichage des résultats:
$("#listeResultats").empty();
for(product of result.produits){
  console.log(product);
  var tag_result_item = document.createElement("li");
        var result_content_item = document.createTextNode("Nom du produit : "+product.nom+"\nDescription : "+product.description+"\nPrix : "+product.prix);
        tag_result_item.appendChild(result_content_item);
        var result_content_img = document.createElement("img");
        result_content_img.setAttribute("src",product.photo);
        tag_result_item.appendChild(result_content_img);
        document.getElementById("listeResultats").appendChild(tag_result_item);


}

    }
  };

  xhr.onerror = function () {
    alert("La requête a échoué");
    return null;
  };



  /*$("#listeMarque").load(
    "filters.php",
    `marque=${brandSelected}&categorie=${categorySelected}&prix=${priceSelected}`,
    function (response, status, xhr) {
      if (status != "error") {
        var result = JSON.parse(response);
        var categories = result.categories;
        var tag_option_default = document.createElement("option");
        var option_default = document.createTextNode(
          "--Choisissez une catégorie--"
        );
        tag_option_default.appendChild(option_default);

        document
          .getElementById("listeCategorie")
          .appendChild(tag_option_default);
        for (category of categories) {
          var tag_option = document.createElement("option");
          var option_content = document.createTextNode(category.categorie);
          tag_option.appendChild(option_content);
          document.getElementById("listeCategorie").appendChild(tag_option);
        }

        var marques = result.marques;
        var tag_option_default_marque = document.createElement("option");
        var option_default_marque = document.createTextNode(
          "--Choisissez une marque--"
        );
        tag_option_default_marque.appendChild(option_default_marque);
        document
          .getElementById("listeMarque")
          .appendChild(tag_option_default_marque);
        for (brand of marques) {
          var tag_option_marque = document.createElement("option");
          var option_content_marque = document.createTextNode(brand.marque);
          tag_option_marque.appendChild(option_content_marque);
          document.getElementById("listeMarque").appendChild(tag_option_marque);
        }

        var priceMax = result.priceMax;
        document.getElementById("prix").setAttribute("max", priceMax);
      } else {
        console.log("Erreur");
      }
    }
  );*/
}
