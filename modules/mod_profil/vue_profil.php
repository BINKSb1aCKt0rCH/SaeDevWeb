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

    public function modifierProfil($donnees){
        ?>
        <div class="popup" enctype="" id="modif">
                        
        <div class="close-btn">&times;</div>
        <div class="form">
        
        <form method ="post" action="index.php?module=profil&action=profil" enctype="multipart/form-data">
        <div class="form-element">
        <h2>Photo de profil :</h2>
            <?php
                if($donnees["avatar"]==null){
                    ?>Pas de photo sélecionnée.<br><?php
                }else{
                    ?><img src="<?=$donnees["avatar"]?>"/>
                    <?php
                }
            ?>
            <input type="file" name="avatar" />
        </div>
        <div class="form-element">
            <h2>Nom JOUEUR</h2>
            <input type="text" id="nomJoueur" name="nomJOueur"
             value="<?= $donnees['nomJoueur']?>"/>
        </div>
        <div class="form-element">
            <h2>Description</h2>
            <input type="text" id="description" name="description"
             value="<?= $donnees['description']?>"/>
        </div>
        <input type="hidden" name="id" value="<?=$donnees['idJoueur']?>">
        <div class="form-element">
            <button type="submit" name="submit">Valider les changements</button>
        </div>
</form>
    </div>
</div><?php
    }
    public function confirmModif() {
		echo "Profil bien modifié !";
	}

	public function erreurBD() {
		echo "Erreur lors de l'ajout/modification dans la BD";
	}
public function affiche(/*$logo,*/$pseudo,$description,$succes) {
    ?>
    <head>
  <meta charset="utf-8">
  <title>Profil</title>
  <link rel="stylesheet" href="style/Profil_style.css">
  </head>
    <div class="contenu">
        <section class="intro">
            <div class="imageFond">
                <img src="images/imageSite1.png" class="cover_photo" height="200px" width="400px">
                <div class="photoProfil">
                    <!--<img src="images/profil.png">-->
                    <!--TODO-->
                    <?php/* $this->afficheLogo($logo); */?>
                </div>
                <div class="titre">
                    <h1><?php $this->getPseudo($pseudo); ?></h1>
                </div>
                <div class="boutons">
                    <button class="btn btn1" id="ajoutAmi" class="button">
                        <i class="fas fa-user-plus"></i>
                        Ajouter Ami
                    </button>
                
                        <a href="index.php?module=profil&action=modifProfil">
                            Modification profil</a>
                    
                    <!--formulaire pop pour modifier un éléement du profil-->
                    <!--<div class="popup" id="modif">
                        
        <div class="close-btn">&times;</div>
        <div class="form">
        
        <form method ="post" >
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
</div>-->
                
                </div>
                <h1>Description : <h1>
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
            </div>
        </section>
    </div>
    <script src="scriptProfil.js"></script>

    <?php
    }
}

?>