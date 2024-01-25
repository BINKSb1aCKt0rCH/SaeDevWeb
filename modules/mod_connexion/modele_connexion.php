<?php
require_once 'Connexion.php';

class ModeleConnexion extends Connexion {
  


    public function verifiernomJoueurExistant($nomJoueur) {
	    try {
		$query = self::$bdd->prepare("SELECT idJoueur, nomJoueur, passwd FROM Joueur WHERE nomJoueur = :nomJoueur");
		$query->bindParam(':nomJoueur', $nomJoueur, PDO::PARAM_STR);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	    } catch (PDOException $e) {
		die('Erreur lors de la vérification du nomJoueur : ' . $e->getMessage());
	    }
	}

    public function ajouterUtilisateur($nomJoueur, $mot_de_passe_hash) {
	try {
         $stmt = self::$bdd->prepare("INSERT INTO Joueur (nomJoueur, passwd) VALUES (:nomJoueur, :passwd)");
        $stmt->bindParam(':nomJoueur', $nomJoueur,PDO::PARAM_STR);
        $stmt->bindParam(':passwd', $mot_de_passe_hash,PDO::PARAM_STR);
         return $stmt->execute(); 
    } catch (PDOException $e) {
          die('Erreur lors de l\'ajout du joueur : ' . $e->getMessage());
     }
}
}
?>