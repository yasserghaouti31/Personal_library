<?php
   include("../includes/connexion.php");
  include("../includes/fonction_auteurs.php");
  include("../includes/fonction_livres.php");
  $auteurs = getAllAuteurs($connexion);
  include("../header.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des auteurs</title>
  <link rel="stylesheet" href="../style2.css">
</head>
<body>
    <div class="container">
      <h1 class="page-title">Liste des auteurs</h1>
    </div>

  <main>
    <div class="container">
      <table class="author-table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Book</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($auteurs as $auteur): ?>
            <tr>
              <td><?= $auteur['nom'] ?></td>
              <td><?= $auteur['prenom'] ?></td>
              <td>
                <?php
                $livres_auteur=getLivrebyAuteur($connexion,$auteur['id_auteur']);
                if(!empty($livres_auteur)){
                  $first=true;
                  foreach($livres_auteur as $livre){
                    if(!$first){
                      echo " , ";
                    }
                    echo $livre['titre'];
                    $first = false;
                  } 
                }
                else{
                  echo"acucun";
                }
                ?>
              </td>
              <td>
                <a href="modifier.php?id_auteur=<?= $auteur['id_auteur'] ?>" class="button edit">Modifier</a>
                <a href="supprimer.php?id_auteur=<?= $auteur['id_auteur'] ?>" class="button delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet auteur ?')">Supprimer</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="action-container">
        <a href="ajouter.php" class="button add">Ajouter un auteur</a>
      </div>
    </div>
  </main>
</body>
</html>
