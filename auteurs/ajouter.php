<?php
  include("../includes/connexion.php");
  include("../includes/fonction_auteurs.php");
  if (isset($_POST['nom']) && isset($_POST['prenom'])) {
    $nom = mysqli_real_escape_string($connexion, $_POST['nom']);
    $prenom = mysqli_real_escape_string($connexion, $_POST['prenom']);
    addAuteur($connexion, $nom, $prenom);
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ajouter un auteur</title>
  <link rel="stylesheet" href="../style1.css">
</head>
<body>
  <header>
    <h1>Ajouter un auteur</h1>
  </header>
  <main>
    <form method="post">
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required><br><br>
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom" required><br><br>
      <button type="submit">Ajouter</button>
    </form>
  </main>
</body>
</html>