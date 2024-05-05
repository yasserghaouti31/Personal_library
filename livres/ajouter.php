<?php
  include("../includes/connexion.php");
  include("../includes/fonction_livres.php");

  if (isset($_POST['titre']) && isset($_POST['annee_edition'])) {
    $titre = mysqli_real_escape_string($connexion, $_POST['titre']);
    $annee_edition = $_POST['annee_edition'];
    addLivre($connexion, $titre, $annee_edition);
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un livre</title>
  <link rel="stylesheet" href="../style5.css">
</head>
<body>
  <header>
    <h1>Ajouter un livre</h1>
  </header>
  <main>
    <form method="post">
      <label for="titre">Titre :</label>
      <input type="text" name="titre" id="titre" required><br><br>
      <label for="annee_edition">Année d'édition :</label>
      <input type="number" name="annee_edition" id="annee_edition" min="1000" max="2999" required><br><br>
      <button type="submit">Ajouter</button>
    </form>
  </main>
</body>
</html