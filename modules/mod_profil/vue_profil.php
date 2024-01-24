<?php
require_once 'vue_generique.php';
class VueProfil extends VueGenerique {
    public function afficheLogo($logo){
       echo' <img src="images/'.$logo .'"/>' ;
    }
    public function getDescription($descr){
        echo $descr;
    }
    public function getPseudo($pseudo){
        echo $pseudo['nomJoueur'];
    }
    public function getSucces($tab){
        echo '<ol>';
            foreach($tab as $succes){
                echo 
                '<li>' .$succes['idSucces']. ' '.$succes['nomSucces'] 
                .'</li>';
            }
        echo '</ol>';
    }
public function affiche($logo,$pseudo,$description,$succes) {
    ?>
    <head>
  <meta charset="utf-8">
  <title>Profil</title>
  <link rel="stylesheet" href="style/Profil_style.css">
  </head>
    <div class="contenu">
        <section class="intro">
            <div class="imageFond">
                <img src="images/imageSite1.png" class="cover_photo">
                <div class="photoProfil">
                    <!--<img src="images/profil.png">-->
                    <!--TODO-->
                    <?php $this->afficheLogo($logo); ?>
                </div>
                <div class="titre">
                    <h1><?php $this->getPseudo($pseudo); ?></h1>
                </div>
                <div class="boutons">
                    <button class="btn btn1" id="ajoutAmi">
                        <i class="fas fa-user-plus"></i>
                        Ajouter Ami
                    </button>
                    <button class="btn btn2" id="modifProfil">
                        <i class="fa-solid fa-ellipsis"></i>
                        Modification profil
                    </button>
                    <!--formulaire pop pour modifier un éléement du profil-->
                    <div class="popup" id="modif">
    <div class="close-btn">&times;</div>
    <div class="form">
        <form method ="post">
        <div class="form-element">
            <h2>Photo de profil :</h2>
            <input type="file" id="profil" />
        </div>
        <div class="form-element">
            <h2>Description</h2>
            <input type="text" id="description" />
        </div>
        <div class="form-element">
            <button type="submit" name="submit">Valider les changements</button>
        </div>
</form>
    </div>
</div>
<!--
<div class="popup">
    <div class="close-btn">&times;</div>
    <div class="form">
        <div class="form-element">
            <h2>Chercher un joueur :</h2>
            <input type="text" id="chercherJoueur" />
        </div>
        <div class="form-element">
            <button>Chercher le joueur</button>
        </div>
    </div>
</div>-->
                <!--
                </div>
                <div class="desc">
                    <?php $this->getDescription($description)?>

                </div>
                <div class="corpsPage">
                    <div class="succes">
                        <h1>Les SUCCES</h1>
                        <img src="images/medaille.png">
                        <?php $this->getSucces($succes)?>
                    </div>

                    <div class="stats">
                        <h1>Les STATS</h1>
                        <img src = "images/stats.png">
                        <p>Calcul des stats</p>
                    </div>
                </div>
            </div>-->
        </section>
    </div>
    <script src="scriptProfil.js"></script>

    <?php
    }
}

?>