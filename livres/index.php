<?php
  include("../includes/connexion.php");
  include("../includes/fonction_livres.php");
  include("../includes/fonction_auteurs.php");
  include("../header.php");
  $livres = getAllLivres($connexion);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des livres</title>
    <link rel="stylesheet" href="../style6.css">
</head>
<body>
  <header>
        
</header>
<div class="container">
<h1>Liste des livres </h1>
</div>
    <main>
        <div class="container">
            <table class="book-table">
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
            <div class="actions">
                <a href="ajouter.php" class="button add">Ajouter un livre</a>
                <a href="recherche.php" class="button search">Rechercher un livre</a>
            </div>
        </div>
    </main>
</body>
</html>
