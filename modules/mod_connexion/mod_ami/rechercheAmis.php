<?php
// Démarrer la session et inclure les fichiers nécessaires
session_start();
require_once 'Connexion.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour effectuer cette action.";
    exit;
}

// Vérifier si le formulaire a été soumis
if (isset($_GET['nomJoueur'])) {
    $nomJoueur = trim($_GET['nomJoueur']);

    // Établir une connexion à la base de données
    $db = Connexion::getConnexion();

    // Préparer la requête SQL pour éviter les injections SQL
    $stmt = $db->prepare("SELECT * FROM Joueur WHERE nom = ?");
    $stmt->bind_param("s", $nomJoueur); // 's' spécifie le type de paramètre -> string

    // Exécuter la requête
    $stmt->execute();

    // Récupérer le résultat
    $result = $stmt->get_result();

    // Vérifier si un joueur a été trouvé
    if ($result->num_rows > 0) {
        // Joueur trouvé
        while ($row = $result->fetch_assoc()) {
            echo "Joueur trouvé : " . $row['nom']; // ou autre information du joueur
        }
    } else {
        // Aucun joueur trouvé
        echo "Aucun joueur nommé '" . htmlentities($nomJoueur) . "' n'a été trouvé.";
    }

    // Fermer la déclaration
    $stmt->close();
}

// Fermer la connexion à la base de données
$db->close();
?>
