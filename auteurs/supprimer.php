<?php
  include("../includes/connexion.php");
  include("../includes/fonction_auteurs.php");

  if (isset($_GET['id_auteur'])) {
    $id_auteur = $_GET['id_auteur'];
    $auteur = getAuteurById($connexion, $id_auteur);
  }
  if (isset($_POST['confirmation'])) {
    supprimerAuteur($connexion, $id_auteur);
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supprimer un auteur</title>
  <link rel="stylesheet" href="../style4.css">
</head>
<body>
  <header>
    <div class="container">
      <h1>Supprimer un auteur</h1>
    </div>
  </header>
  <main>
    <div class="container">
      <?php if (isset($auteur)): ?>
        <p>Êtes-vous sûr de vouloir supprimer l'auteur suivant ?</p>
        <ul>
          <li><strong>Nom :</strong> <?= $auteur['nom'] ?></li>
          <li><strong>Prénom :</strong> <?= $auteur['prenom'] ?></li>
        </ul>
        <form method="post">
          <input type="hidden" name="id_auteur" value="<?= $auteur['id_auteur'] ?>">
          <button type="submit" name="confirmation" value="supprimer" class="button delete">Confirmer la suppression</button>
        </form>
      <?php else: ?>
        <p>L'auteur n'a pas été trouvé.</p>
      <?php endif; ?>
    </div>
  </main>
</body>
</html>
