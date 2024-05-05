<?php
function getAllAuteurs($connexion) {
  $requete = "SELECT * FROM auteurs";
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la récupération des auteurs : " . mysqli_error($connexion));
  }
  $auteurs = array();
  while ($row = mysqli_fetch_assoc($resultat)) {
    $auteurs[] = $row;
  }
  mysqli_free_result($resultat);
  return $auteurs;
}

function getAuteurById($connexion, $id_auteur) {
  $requete = "SELECT * FROM auteurs WHERE id_auteur = " . $id_auteur;
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la récupération de l'auteur : " . mysqli_error($connexion));
  }
  $auteur = mysqli_fetch_assoc($resultat);
  mysqli_free_result($resultat);
  return $auteur;
}

function addAuteur($connexion, $nom, $prenom) {
  $requete = "INSERT INTO auteurs (nom, prenom) VALUES ('" . $nom . "', '" . $prenom . "')";
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de l'ajout de l'auteur : " . mysqli_error($connexion));
  }
}

function modifierAuteur($connexion, $id_auteur, $nom, $prenom) {
  $requete = "UPDATE auteurs SET nom = '" . $nom . "', prenom = '" . $prenom . "' WHERE id_auteur = " . $id_auteur;
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la modification de l'auteur : " . mysqli_error($connexion));
  }
}

function supprimerAuteur($connexion, $id_auteur) {
  $requete = "DELETE FROM auteurs WHERE id_auteur = " . $id_auteur;
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la suppression de l'auteur : " . mysqli_error($connexion));
  }
}
function getLivrebyAuteur($connexion, $code_auteur) {
  $requete = "SELECT l.titre FROM livres l
              INNER JOIN ecrire ec ON l.code_livre = ec.code_livre
              WHERE ec.id_auteur = " . $code_auteur;
  $resultat = mysqli_query($connexion, $requete);
  if (!$resultat) {
    die("Erreur lors de la récupération des auteurs du livre : " . mysqli_error($connexion));
  }
  $livres = array();
  while ($row = mysqli_fetch_assoc($resultat)) {
    $livres[] = $row;
  }
  mysqli_free_result($resultat);
  return $livres;
}
function addEcriture($connexion, $code_livre, $id_auteur) {
  $requete = "INSERT INTO ecrire (code_livre, id_auteur) VALUES (?, ?)";
  $stmt = mysqli_prepare($connexion, $requete);

  if (!$stmt) {
    return false;
  }

  mysqli_stmt_bind_param($stmt, "ii", $code_livre, $id_auteur);

  $result = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $result;
}

?>
