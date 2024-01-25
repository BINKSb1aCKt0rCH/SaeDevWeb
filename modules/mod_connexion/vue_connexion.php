<?php
require_once 'vue_generique.php';

class VueConnexion extends VueGenerique {

    public function affiche_formulaire_inscription() {
        ?>
        <div class="form-container">
            <h2>Inscription</h2>
            <form method="post" action="index.php?module=connexion&action=inscription">
                Nom d'utilisateur : <input type="text" name="nomJoueur" required><br>
                Mot de passe : <input type="password" name="passwd" required><br>
                <input type="submit" value="S'inscrire">
            </form>
            <p>Si vous avez déjà un compte, <a href="index.php?module=connexion&action=connexion">connectez-vous ici</a>.</p>
        </div>
        <?php
    }

    public function affiche_formulaire_connexion() {
        ?>
        <div class="form-container">
            <h2>Connexion</h2>
            <form method="post" action="index.php?module=connexion&action=connexion"><!--pointe sur la page profil-->
                Nom d'utilisateur : <input type="text" name="nomJoueur" required><br>
                Mot de passe : <input type="password" name="passwd" required><br>
                <input type="submit" value="Se connecter">
            </form>
            <p>Si vous n'avez pas de compte, <a href="index.php?module=connexion&action=afficher">inscrivez-vous ici</a>.</p>
        </div>
        <?php
    }

}
?>
