<?php 
require_once 'vue_generique.php';

class VueAmi extends VueGenerique{

    public function affiche_ami($amis) {
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="modules/mod_ami/amis.css">
        </head>
        <div id="ami-barre-container">
        <div id="ami-container">
            <h1>Amis</h1>
            <?php
            if(isset($_SESSION['message'])){
                ?>
                <div style="color:red; text-align: center;"><?=$_SESSION['message']?></div><br>
                <?php
                unset($_SESSION['message']);
            }else {
                foreach ($amis as $ami) {
                    ?>
                    <div class="ami-item">
                        <span class="nom-ami"><?= $ami['nomJoueur'] ?></span>
                        <a class="bouton-supprimer" href="index.php?module=ami&action=supprimer&id=<?= $ami['idJoueur'] ?>">Supprimer</a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <?php
    }

    public function affiche_barre(){
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="modules/mod_ami/amis.css">
        </head>
        <div id="barre-container">
            <h2>Faites vous des amis</h2>
            <form action="index.php?module=ami&action=liste" method="post">
                <label for="nomJoueur">Entrez le nom du joueur :</label><br>
                <input type="text" id="nomJoueur" name="nomJoueur"><br>
                <input type="submit" value="Rechercher">
            </form>
            <br>
            <br>
            <?php 
            if(isset($_SESSION['erreur'])){
                ?>
                <div style="color:red; text-align: center;"><?=$_SESSION['erreur']?></div><br>
                <?php
                unset($_SESSION['erreur']);
            }
            ?>
        </div>
        </div>

        <?php
    }

    function affiche_liste($tab) {
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="modules/mod_ami/amis.css">
        </head>
        <div id="liste-container">
            <?= $tab[0]['nomJoueur'] ?><a class="menu-button" href="index.php?module=ami&action=ajouter&id=<?= $tab[0]['idJoueur'] ?>&date=<?= date('Y-m-d H:i:s') ?>"> Ajouter</a>
            <br>
            <br>
        </div>
        <?php
    }

    public function affiche_demandeAmis($demandes) {
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="modules/mod_ami/amis.css">
        </head>
        <div id="demandeAmis-container">
            <br>
            <h2>Demande d'amis:</h2>
            <br>
            <?php
             if(isset($_SESSION['message_erreur'])){
                ?>
                <div style="color:red; text-align: center;"><?=$_SESSION['message_erreur']?></div><br>
                <?php
                unset($_SESSION['message_erreur']);
            }else {
                foreach ($demandes as $demandeAmis) {
                    ?>
                    <div class="ami-item">
                        <span class="nom-ami"><?= $demandeAmis['nomJoueur'] ?></span>
                        <a class="bouton-supprimer" href="index.php?module=ami&action=accepter&id=<?= $demandeAmis['idJoueur'] ?>">Accepter</a>
                        <a class="bouton-supprimer" style="background-color: #dc3545;" href="index.php?module=ami&action=refuser&id=<?= $demandeAmis['idJoueur'] ?>">Refuser</a>
                        </div>
                    <?php 
                }
            }
            ?>
        </div>
        <?php
    }
}
?>
