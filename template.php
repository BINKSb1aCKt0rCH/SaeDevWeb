<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('/home/etudiants/info/zgueddou/local_html/SAE_Web/SaeDevWeb/images/imageMenu.jpg'); /* Remplacez ceci avec votre propre lien d'image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        header, footer {
            background-color: #007bff; /* Couleur bleue, changez selon vos préférences */
            color: white; /* Texte en blanc pour plus de visibilité */
            padding: 10px;
        }
        main {
            flex-grow: 1;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }
        header > div, header > nav {
            display: flex;
            align-items: center;
        }
        nav {
            gap: 10px;
        }
        .login-icon {
            width: 24px;
            height: 24px;
            background-image: url('/home/etudiants/info/zgueddou/local_html/SAE_Web/SaeDevWeb/connect.png'); /* Remplacer par le chemin vers votre icône */
            background-size: cover;
        }
    </style>
</head>
<body>
<header>
    <div><h1>Tower Defense</h1></div>
    <nav>
        <button>Tours</button>
        <button>Ennemis</button>
        <button>Classement</button>
        <button>Se connecter</button>

        <div class="login-icon"></div>  <!-- Bouton pour se connecter/s'inscrire -->
    </nav>
</header>
<main>
    <!-- Contenu de la page -->
    <?php echo ''.$contenuModule; ?>
</main>
<footer>
    <p>Tower Defense / Informations légales</p>
</footer>
</body>
</html>
