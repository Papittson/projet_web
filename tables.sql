DROP TABLE IF EXISTS Clients, Commandes, LignesCommandes, Produits;

CREATE TABLE Clients(email varchar(255),motDePasse varchar(255),nom varchar(255), prenom varchar(255),ville varchar(255), adresse varchar(255),telephone varchar(10));
CREATE TABLE Produits(idProduit int , nom varchar(255), marque varchar(255), categorie varchar(255), description varchar(255), photo text,prix float(7,2), stock int);
CREATE TABLE Commandes(idCommande int , dateCommande datetime, email varchar(255),etat text);
CREATE TABLE LignesCommandes(idLigneCommande int , idCommande int,idProduit int,quantite int,montant float(7,2));

ALTER TABLE Clients ADD CONSTRAINT email_PK PRIMARY KEY Clients(email);
ALTER TABLE Commandes ADD CONSTRAINT idCommande_PK PRIMARY KEY Commandes(idCommande) ;
ALTER TABLE Produits ADD CONSTRAINT idProduit_PK PRIMARY KEY Produits(idProduit) ;
ALTER TABLE LignesCommandes ADD CONSTRAINT idLigneCommande_PK PRIMARY KEY LignesCommandes(idLigneCommande) ;


ALTER TABLE Commandes ADD CONSTRAINT email_FK FOREIGN KEY commandes(email) REFERENCES Clients(email) ON DELETE CASCADE;
ALTER TABLE LignesCommandes ADD CONSTRAINT idCommande_FK FOREIGN KEY lignescommandes(idCommande) REFERENCES Commande(idCommande) ON DELETE CASCADE;
ALTER TABLE LignesCommandes ADD CONSTRAINT idProduit_FK FOREIGN KEY lignescommandes(idProduit) REFERENCES Produits(idProduit) ON DELETE CASCADE;

ALTER TABLE Commandes AUTO_INCREMENT=1;
ALTER TABLE LignesCommandes AUTO_INCREMENT=1;
ALTER TABLE Produits AUTO_INCREMENT=1;

INSERT INTO Produits (nom, marque, categorie, description, prix , stock, photo) VALUES ("Redmi note 7", "Xiaomi","téléphone","plutôt chouette téléphone", 299.99, 500,"https://cdn.webshopapp.com/shops/256009/files/270637702/xiaomi-xiaomi-redmi-note-7-4gb-128gb.jpg") , ("Redmi note 8", "Xiaomi","téléphone","plutôt très chouette téléphone", 499.99, 500,"https://m.media-amazon.com/images/I/41FQEgRHY4L._AC_.jpg") ,("Pad 5", "Xiaomi","tablette","plutôt chouette tablette", 399.99, 150,"https://images.frandroid.com/wp-content/uploads/2021/08/xiaomi-mi-pad-5-frandroid-2021.png");
INSERT INTO Produits(nom, marque, categorie, description, prix , stock) VALUES ("Galaxy note 5", "Samsung","téléphone","plutôt chouette téléphone", 485.99, 500),("Iphone 6S","Apple","téléphone","chouette téléphone",500.75,350);