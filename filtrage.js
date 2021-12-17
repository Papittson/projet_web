synchronizeList("marque");

function synchronizeList(type) {
  var brandSelected = document.getElementById("listeMarque").value;
  var categorySelected = document.getElementById("listeCategorie").value;
  var priceSelected = document.getElementById("prix").value;
  var nameSelected = document.getElementById("nom").value;

  let xhr = new XMLHttpRequest();

  xhr.open(
    "GET",
    `/filters.php?marque=${brandSelected}&categorie=${categorySelected}&prix=${priceSelected}&nom=${nameSelected}`
  );

  xhr.responseType = "json";

  xhr.send();

  xhr.onload = function () {
    if (xhr.status != 200) {
      alert("Erreur " + xhr.status + " : " + xhr.statusText);
      return null;
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

        document
          .getElementById("listeCategorie")
          .appendChild(tag_option_default);
        for (category of categories) {
          var tag_option = document.createElement("option");
          var option_content = document.createTextNode(category.categorie);
          tag_option.appendChild(option_content);
          document.getElementById("listeCategorie").appendChild(tag_option);

          if (category.categorie == categorySelected) {
            categoryFound = true;
          }
        }

        if (categoryFound) {
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

          if (brand.marque == brandSelected) {
            brandFound = true;
          }
        }

        if (brandFound) {
          document.getElementById("listeMarque").value = brandSelected;
        }
      }

      var priceMax = result.priceMax;
      document.getElementById("prix").setAttribute("max", priceMax);
      document.getElementById("prix").setAttribute("value", priceMax);

      //partie affichage des résultats:
      $("#listeResultats").empty();
      for (product of result.produits) {
        var tag_result_div = document.createElement("div");
        var tag_result_item = document.createElement("li");
        var result_content_item = document.createTextNode(
          "Nom du produit : " +
            product.nom +
            "\nDescription : " +
            product.description +
            "\nPrix : " +
            product.prix
        );
        tag_result_item.appendChild(result_content_item);

        var result_content_img = document.createElement("img");
        result_content_img.setAttribute("src", product.photo);
        tag_result_item.appendChild(result_content_img);
        tag_result_div.appendChild(tag_result_item);
        tag_result_div.setAttribute("id", product.idProduit);
        tag_result_div.setAttribute(
          "onclick",
          `location.href='pageAffichageProduit.php?idProduit=${product.idProduit}'`
        );
        tag_result_div.setAttribute("class","result_display")
        document.getElementById("listeResultats").appendChild(tag_result_div);
      }
    }
  };

  xhr.onerror = function () {
    alert("La requête a échoué");
    return null;
  };

  
}
