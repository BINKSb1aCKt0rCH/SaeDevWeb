<?php
require_once 'connexion.php';

class ModeleProfil extends Connexion{
    public function __construct(){
        parent::initConnexion();
    }
    //ajout d'une pp d'une description 
    
    public function modifierProfil($id, $bio, $nom){
        if(isset($_POST['submit'])){
        $req = self::$bdd->prepare("UPDATE Joueur SET nomJoueur=?, description=? WHERE idJoueur = ?");
        $req->execute(array($nom, $bio, $id));
    
        // Utilisation de rowCount() pour vérifier le nombre de lignes affectées
        if($req->rowCount() == 0){
            return false;
        } else {
            return true;
        }
    }
    }
    
    
    public function getSucces($id) {
        $req = self::$bdd->prepare("SELECT idSucces, nomSucces FROM Succes 
            NATURAL JOIN gagneSucces 
            NATURAL JOIN Joueur 
            WHERE idJoueur = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
    
        if ($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            
            return $res;
        } else {
            return null;
        }
    }
    
    public function getIdJoueur($nomJoueur) {
        $req = self::$bdd->prepare("SELECT idJoueur FROM Joueur WHERE nomJoueur = :nomJoueur");
        $req->bindParam(':nomJoueur', $nomJoueur, PDO::PARAM_STR); // Utilisation de PDO::PARAM_STR
        if ($req->execute()) {
            $res = $req->fetch(PDO::FETCH_ASSOC);
            return $res;
        } else {
            return null;
        }
    }

    public function getPseudo($id) {
        $req = self::$bdd->prepare("SELECT nomJoueur FROM Joueur WHERE idJoueur = :id");
        $req->bindParam(':id', $id['idJoueur'], PDO::PARAM_INT);
        if ($req->execute()) {
            $res = $req->fetch(PDO::FETCH_ASSOC);

            return $res;
        } else {
            return 0;
        }
    }

    public function getDescription($id) {
       
        $query = 'SELECT `description` FROM Joueur WHERE idJoueur = :id1';
        $req = parent::$bdd->prepare($query);
        $req->bindParam(':id1', $id["idJoueur"], PDO::PARAM_INT);
       
        if ($req->execute()) {
            $res = $req->fetch(PDO::FETCH_ASSOC);
            return $res['description']; // Retourne la valeur de la colonne 'description'
        } else {
            return null;
        }
    }
    

    public function logo($id) {
        /*
        if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) { // Utilisation de la constante UPLOAD_ERR_OK
            $dossierDest = "images/";
            $tmp_name = $_FILES['avatar']['tmp_name'];
            $nomFic = basename($_FILES['avatar']['name']); // Correction : ['name'] au lieu de ['name']
            $chemin = $dossierDest . $nomFic;
            move_uploaded_file($tmp_name, $chemin); // Utilisation de $tmp_name au lieu de "$tmp_name"
            $lien = $dossierDest . $nomFic;
            return $lien;
        }*/
            if ($_FILES['profil']['error'] === UPLOAD_ERR_OK) {
                $dossierDest = "images/";
                $tmp_name = $_FILES['profil']['tmp_name'];
                $nomFic = basename($_FILES['profil']['name']);
                $chemin = $dossierDest . $nomFic;
        
                // Vérifier si le fichier a été correctement téléchargé
                if (move_uploaded_file($tmp_name, $chemin)) {
                    $req = "UPDATE joueur SET photo=? WHERE id=?";
                    $pdo_req = self::$bdd->prepare($req);
                    $pdo_req->execute(array($chemin, $id));
        
                    // Vérifier si la mise à jour a affecté des lignes
                    if ($pdo_req->rowCount() == 0) {
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    // Gestion des erreurs de téléchargement
                    echo "Erreur lors du téléchargement du fichier.";
                    return false;
                }
            } else {
                // Gestion des erreurs d'upload
                echo "Erreur d'upload du fichier.";
                return false;
            }
        }
}
?>