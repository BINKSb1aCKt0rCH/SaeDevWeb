<?php 

require_once 'Connexion.php';

class ModeleMessage extends Connexion{

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
    }

    function recupererami($id) {
        try {
            $requete = $this->connexion->getBdd()->prepare('
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

    public function listeMessage($id, $idJoueur) {
        try {
            $requete = "SELECT * FROM message WHERE (idJoueur = ? AND idJoueur_message = ?) OR (idJoueur = ? AND idJoueur_message = ?) ORDER BY date ASC;
            ";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->execute([$id, $idJoueur, $idJoueur, $id]);
            $tableau = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$tableau) {
                return false;
            }

            return $tableau;
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
            return false;
        }
    }

    public function envoieMessage($id, $idami, $date, $message) {
		try {
			$stmt = self::$bdd->prepare("INSERT INTO message (idJoueur, idJoueur_message, date, message) VALUES (?, ?, ?, ?)");
			return $stmt->execute([$id, $idami, $date, $message]); 
		} catch (PDOException $e) {
			die('Erreur lors de l\'ajout du Joueur : ' . $e->getMessage());
		}
	}

}

?>