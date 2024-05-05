<?php
function getAllLivres($connexion) {
  $requete = "SELECT * FROM livres";
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la récupération des livres : " . mysqli_error($connexion));
  }
  $livres = array();
  while ($row = mysqli_fetch_assoc($resultat)) {
    $livres[] = $row;
  }
  mysqli_free_result($resultat);
  return $livres;
}

function getLivreById($connexion, $code_livre) {
  $requete = "SELECT * FROM livres WHERE code_livre = " . $code_livre;
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la récupération du livre : " . mysqli_error($connexion));
  }
  $livre = mysqli_fetch_assoc($resultat);
  mysqli_free_result($resultat);
  return $livre;
}

function addLivre($connexion, $titre, $annee_edition) {
  $requete = "INSERT INTO livres (titre, annee_edition) VALUES ('" . $titre . "', " . $annee_edition . ")";
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de l'ajout du livre : " . mysqli_error($connexion));
  }
}

function modifierLivre($connexion, $code_livre, $titre, $annee_edition) {
  $requete = "UPDATE livres SET titre = '" . $titre . "', annee_edition = " . $annee_edition . " WHERE code_livre = " . $code_livre;
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la modification du livre : " . mysqli_error($connexion));
  }
}

function supprimerLivre($connexion, $code_livre) {
  $requete = "DELETE FROM livres WHERE code_livre = " . $code_livre;
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la suppression du livre : " . mysqli_error($connexion));
  }
}
function getAuteursByLivre($connexion, $code_livre) {
  $requete = "SELECT a.nom, a.prenom FROM auteurs a
              INNER JOIN ecrire ec ON a.id_auteur = ec.id_auteur
              WHERE ec.code_livre = " . $code_livre;
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la récupération des auteurs du livre : " . mysqli_error($connexion));
  }
  $auteurs = array();
  while ($row = mysqli_fetch_assoc($resultat)) {
    $auteurs[] = $row;
  }
  mysqli_free_result($resultat);
  return $auteurs;
}
function searchLivres($connexion, $recherche) {
  $recherche = "%" . mysqli_real_escape_string($connexion, $recherche) . "%";
  $livres = array();

  $req = "SELECT DISTINCT l.* FROM livres l
          INNER JOIN ecrire ec ON l.code_livre = ec.code_livre
          INNER JOIN auteurs a ON ec.id_auteur = a.id_auteur
          WHERE CONCAT(l.titre, ' ', a.nom, ' ', a.prenom) LIKE '" . $recherche . "'";

  $resultat = mysqli_query($connexion, $req);
  if ($resultat) {
    while ($row = mysqli_fetch_assoc($resultat)) {
      $livres[] = $row;
    }
    mysqli_free_result($resultat);
  }

  return $livres;
}
?>