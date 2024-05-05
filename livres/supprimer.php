<?php
include("../includes/connexion.php");
include("../includes/fonction_livres.php");

  if (isset($_GET['code_livre'])) {
    $code_livre = $_GET['code_livre'];
    $livre = getLivreById($connexion, $code_livre);
  }

  if (isset($_POST['confirmation'])) {
    supprimerLivre($connexion, $code_livre);
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un livre</title>
    <link rel="stylesheet" href="../style9.css">
</head>
<body>
    <header>
        <h1>Supprimer un livre</h1>
    </header>
    <main>
        <?php if (isset($livre)): ?>
            <section>
                <p>Êtes-vous sûr de vouloir supprimer le livre suivant ?</p>
                <ul>
                    <li>Titre : <?= $livre['titre'] ?></li>
                    <li>Année d'édition : <?= $livre['annee_edition'] ?></li>
                </ul>
                <form method="post">
                    <input type="hidden" name="code_livre" value="<?= $livre['code_livre'] ?>">
                    <button type="submit" name="confirmation" value="supprimer">Supprimer</button>
                </form>
            </section>
        <?php else: ?>
            <section>
                <p>Le livre n'a pas été trouvé.</p>
            </section>
        <?php endif; ?>
    </main>
</body>
</html>
