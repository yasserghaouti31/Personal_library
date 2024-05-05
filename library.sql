CREATE TABLE livres (
  code_livre INT PRIMARY KEY AUTO_INCREMENT,
  titre VARCHAR(255) NOT NULL,
  annee_edition INT NOT NULL
);

CREATE TABLE auteurs (
  id_auteur INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  prenom VARCHAR(255) NOT NULL
);
CREATE TABLE ecrire (
  code_livre INT NOT NULL,
  id_auteur INT NOT NULL,
  PRIMARY KEY (code_livre, id_auteur),
  FOREIGN KEY (code_livre) REFERENCES livres(code_livre),
  FOREIGN KEY (id_auteur) REFERENCES auteurs(id_auteur)
);

INSERT INTO livres (titre, annee_edition)
VALUES ('Étranger', 1942);


INSERT INTO auteurs (nom, prenom) VALUES ('Albert', 'Camus');
INSERT INTO auteurs (nom, prenom) VALUES ('Jean-Paul', 'Sartre');

-- Récupérer les identifiants des auteurs insérés
SELECT id_auteur FROM auteurs WHERE nom IN ('Albert', 'Jean-Paul');

-- Associer le livre aux deux auteurs
INSERT INTO ecrire (code_livre, id_auteur)
SELECT LAST_INSERT_ID() AS code_livre, id_auteur FROM auteurs WHERE nom IN ('Albert', 'Jean-Paul');
