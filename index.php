<?php
  include("includes/connexion.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de la bibliothèque</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <header>
        <div class="container">
            <h1>Gestion de la bibliothèque</h1>
            <nav>
                <ul>
                    <li><a href="#" id="accueil" class="active">Accueil <span class="material-symbols-outlined">
home
</span></a></li>
                    <li><a href="auteurs/">Auteurs <span class="material-symbols-outlined">
person
</span></a></li>
                    <li><a href="livres/">Livres <span class="material-symbols-outlined">
book_2
</span></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main id="user-interface">
        <section class="hero">
            <div class="container">
                <h2>Bienvenue dans votre bibliothèque personnelle</h2>
                <p>Explorez votre collection de livres et d'auteurs.</p>
            </div>
        </section>

        <section class="books">
            <div class="container">
                <h2>Nos Livres</h2>
                <div class="book-list" id="user-book-list">
                    <div class="book-card"></div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>© 2024 Ma Bibliothèque. Tous droits réservés.</p>
        </div>
    </footer>
    <script>
   var accueilLink = document.getElementById('accueil');

accueilLink.addEventListener('click', function(event) {
    event.preventDefault();
    window.location.href = 'index.php'; 
});
</script>
</body>
</html>
