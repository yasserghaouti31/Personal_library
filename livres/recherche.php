<?php
  include("../includes/connexion.php");
  include("../includes/fonction_livres.php");
  include("../includes/fonction_auteurs.php");

  $recherche = "";
  $livres = array();

  if (isset($_POST['recherche'])) {
    $recherche = mysqli_real_escape_string($connexion, $_POST['recherche']);
    $livres = searchLivres($connexion, $recherche);
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rechercher un livre</title>
  <link rel="stylesheet" href="../style8.css">
</head>
<body>
  <header>
    <h1>Rechercher un livre</h1>
  </header>
  <main>
    <form method="post" class="search-form">
      <label for="recherche">Rechercher par titre ou auteur :</label>
      <input type="text" name="recherche" id="recherche" value="<?= $recherche ?>" placeholder="Entrez le titre ou l'auteur du livre">
      <button type="submit">Rechercher</button>
    </form>
    <?php if (!empty($livres)): ?>
      <h2>Résultats de la recherche</h2>
      <table>
        <thead>
          <tr>
            <th>Titre</th>
            <th>Année d'édition</th>
            <th>Auteurs</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($livres as $livre): ?>
            <tr>
              <td><?= $livre['titre'] ?></td>
              <td><?= $livre['annee_edition'] ?></td>
              <td>
                <?php
                  $auteurs_livre = getAuteursByLivre($connexion, $livre['code_livre']);
                  if (!empty($auteurs_livre)) {
                    $first = true;
                    foreach ($auteurs_livre as $auteur) {
                      if (!$first) {
                        echo ', ';
                      }
                      echo $auteur['nom'] . ' ' . $auteur['prenom'];
                      $first = false;
                    }
                  } else {
                    echo 'Aucun';
                  }
                ?>
              </td>
              <td>
                <a href="modifier.php?code_livre=<?= $livre['code_livre'] ?>" class="button modify">Modifier</a>
                <a href="supprimer.php?code_livre=<?= $livre['code_livre'] ?>" class="button delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">Supprimer</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Aucun livre trouvé pour votre recherche.</p>
    <?php endif; ?>
  </main>
</body>
</html>
