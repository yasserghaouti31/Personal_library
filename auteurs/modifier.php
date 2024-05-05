<?php
  include("../includes/connexion.php");
  include("../includes/fonction_auteurs.php");

  if (isset($_GET['id_auteur'])) {
    $id_auteur = $_GET['id_auteur'];
    $auteur = getAuteurById($connexion, $id_auteur);
  }

  if (isset($_POST['nom']) && isset($_POST['prenom'])) {
    $id_auteur = $_POST['id_auteur'];
    $nom = mysqli_real_escape_string($connexion, $_POST['nom']); // Escape user input
    $prenom = mysqli_real_escape_string($connexion, $_POST['prenom']); // Escape user input
    modifierAuteur($connexion, $id_auteur, $nom, $prenom);
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Modifier un auteur</title>
  <link rel="stylesheet" href="../style3.css">
</head>
<body>
  <header>
    <h1>Modifier un auteur</h1>
  </header>
  <main>
    <?php if (isset($auteur)): ?>
      <form method="post">
        <input type="hidden" name="id_auteur" value="<?= $auteur['id_auteur'] ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= $auteur['nom'] ?>" required><br><br>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= $auteur['prenom'] ?>" required><br><br>
        <button type="submit">Modifier</button>
      </form>
    <?php else: ?>
      <p>L'auteur n'a pas été trouvé.</p>
    <?php endif; ?>
  </main>
</body>
</html>