
<?php

$hote = "localhost";
$utilisateur = "root";
$motdepasse = "";
$nom_base = "library";

$connexion = mysqli_connect($hote, $utilisateur, $motdepasse, $nom_base);

if (!$connexion) {
  echo "Erreur de connexion à la base de données : " . mysqli_connect_error();
  exit();
}

?>