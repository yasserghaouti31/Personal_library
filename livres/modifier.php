<?php
  include("../includes/connexion.php");
  include("../includes/fonction_livres.php");
  include("../includes/fonction_auteurs.php");
  
  $auteurs=getAllAuteurs($connexion);
  if (isset($_GET['code_livre'])) {
    $code_livre = $_GET['code_livre'];
    $livre = getLivreById($connexion, $code_livre);
  }
  if (isset($_POST['submit'])) {
    $code_livre = $_POST['code_livre'];
    $titre = mysqli_real_escape_string($connexion, $_POST['titre']);
    $annee_edition = $_POST['annee_edition'];
    modifierLivre($connexion, $code_livre, $titre, $annee_edition);
    $auteurs_selectionnes = isset($_POST['auteurs']) ? $_POST['auteurs'] : array();
    if (!empty($auteurs_selectionnes)) {
      foreach ($auteurs_selectionnes as $auteur_id) {
        if (!addEcriture($connexion, $code_livre, $auteur_id)){
          echo "Erreur lors de l'ajout d'un auteur au livre";
        }
      }
    }
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier un livre</title>
  <link rel="stylesheet" href="../style7.css">
</head>
<body>
  <header>
    <h1>Modifier un livre</h1>
  </header>
  <main>
    <div class="container">
      <?php if (isset($livre)): ?>
        <form method="post">
          <input type="hidden" name="code_livre" value="<?= $livre['code_livre'] ?>">
          <label for="titre">Titre :</label>
          <input type="text" name="titre" id="titre" value="<?= $livre['titre'] ?>" required><br><br>
          <label for="annee_edition">Année d'édition :</label>
          <input type="number" name="annee_edition" id="annee_edition" min="1000" max="2999" value="<?= $livre['annee_edition'] ?>" required><br><br>
          <?php foreach ($auteurs as $auteur): ?>
      <label for="auteur_<?= $auteur['id_auteur'] ?>">
        <input type="checkbox" name="auteurs[]" id="auteur_<?= $auteur['id_auteur'] ?>" value="<?= $auteur['id_auteur'] ?>">
        <?= $auteur['nom'] . ' ' . $auteur['prenom'] ?>
      </label><br>
    <?php endforeach; ?>
          <button type="submit"name="submit" id="submit">Modifier</button>
        </form>
      <?php else: ?>
        <p>Le livre n'a pas été trouvé.</p>
      <?php endif; ?>
    </div>
  </main>
</body>
</html>

