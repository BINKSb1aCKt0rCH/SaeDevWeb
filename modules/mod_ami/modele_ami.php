<?php 

require_once 'Connexion.php';

class ModeleAmi extends Connexion{

    private $connexion;

    function recherche($nomJoueur) {
        try {
            $requete = self::$bdd->prepare('SELECT nomJoueur, idJoueur FROM Joueur WHERE nomJoueur = :nomJoueur');
            $requete->bindParam(':nomJoueur', $nomJoueur, PDO::PARAM_STR);
            $requete->execute();
            
            $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
            
            if (!$tableau) {
                return false;
            }
    
            return $tableau;
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
            return false;
        }
    }

    public function ajouterDemandeAmi($id, $idAmi, $dateDemande) {
		try {
			$stmt = self::$bdd->prepare("INSERT INTO demandeAmis (idJoueur, idJoueur_demandeAmis, dateDemande) VALUES (?, ?, ?)");
			return $stmt->execute([$id, $idAmi, $dateDemande]); 
		} catch (PDOException $e) {
			die('Erreur lors de l\'ajout du joueur : ' . $e->getMessage());
		}
	}

    public function verifdemande($id, $idJoueur) {
        $requete = "SELECT * FROM demandeAmis WHERE idJoueur = ? AND idJoueur_demandeAmis = ?";
        $stmt = self::$bdd->prepare($requete);
        $stmt->execute([$id, $idJoueur]);
        $rowCount = $stmt->rowCount();

        if ($rowCount == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verifdemandeami($id, $idJoueur) {
        $requete = "SELECT * FROM demandeAmis WHERE idJoueur = ? AND idJoueur_demandeAmis = ?";
        $stmt = self::$bdd->prepare($requete);
        $stmt->execute([$idJoueur, $id]);
        $rowCount = $stmt->rowCount();

        if ($rowCount == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verifami($id, $idJoueur) {
        $requete = "SELECT * FROM amis WHERE (idJoueur = ? AND idJoueur_amis = ?) OR (idJoueur = ? AND idJoueur_amis = ?)";
        $stmt = self::$bdd->prepare($requete);
        $stmt->execute([$id, $idJoueur, $idJoueur, $id]);
        $rowCount = $stmt->rowCount();

        if ($rowCount == 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function recupererDemandes($id) {
        try {
            $requete = self::$bdd->prepare('
                SELECT j.nomJoueur, j.idJoueur 
                FROM Joueur j
                JOIN demandeAmis da ON j.idJoueur = da.idJoueur
                WHERE da.idJoueur_demandeAmis = :id AND da.accepter IS NULL AND da.refuser IS NULL
            ');
            $requete->bindParam(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            
            $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
            
            if (!$tableau) {
                return false;
            }
    
            return $tableau;
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
            return false;
        }
    }
    
    

    function supprimerDemande($idJoueur, $idJoueur_demandeAmis) {
        $stmt = self::$bdd->prepare("DELETE FROM demandeAmis WHERE idJoueur = :idJoueur AND idJoueur_demandeAmis = :idJoueur_demandeAmis");
        $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
        $stmt->bindParam(':idJoueur_demandeAmis', $idJoueur_demandeAmis, PDO::PARAM_INT);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
        }
    }

    public function supprimerAmi($id, $idJoueur) {
        try {
            $requete = "DELETE FROM amis WHERE (idJoueur = ? AND idJoueur_amis = ?) OR (idJoueur = ? AND idJoueur_amis = ?)";
            $stmt = self::$bdd->prepare($requete);
            $stmt->execute([$id, $idJoueur, $idJoueur, $id]);
            $rowCount = $stmt->rowCount();
    
            return $rowCount > 0;
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
            return false;
        }
    }
    

    public function ajouterAmi($id, $idAmi) {
        try {
            // Vérifier si l'amitié existe déjà
            $verifRequete = "SELECT * FROM amis WHERE (idJoueur = ? AND idJoueur_amis = ?) OR (idJoueur = ? AND idJoueur_amis = ?)";
            $verifStmt = self::$bdd->prepare($verifRequete);
            $verifStmt->execute([$id, $idAmi, $idAmi, $id]);
            if ($verifStmt->rowCount() > 0) {
                // L'amitié existe déjà
                return false;
            }
    
            // Ajouter la nouvelle amitié
            $stmt = self::$bdd->prepare("INSERT INTO amis (idJoueur, idJoueur_amis) VALUES (?, ?)");
            return $stmt->execute([$id, $idAmi]);
        } catch (PDOException $e) {
            die('Erreur lors de l\'ajout du joueur : ' . $e->getMessage());
        }
    }
    

    function recupererAmi($id) {
        try {
            $requete = self::$bdd->prepare('
            SELECT nomJoueur, idJoueur FROM Joueur 
            WHERE idJoueur IN (
                SELECT idJoueur_amis 
                FROM amis
                WHERE idJoueur = :id

                UNION

                SELECT idJoueur 
                FROM amis
                WHERE idJoueur_amis = :id
            );
            ');
            $requete->bindParam(':id', $id, PDO::PARAM_STR);
            $requete->execute();
            
            $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
            
            if (!$tableau) {
                return false;
            }
    
            return $tableau;
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
            return false;
        }
    }
}

?>