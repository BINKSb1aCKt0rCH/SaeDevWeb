Ex: 
1- SELECT nom, nationalite FROM tennis.joueur WHERE nationalite = 'Russie';
    nom    | nationalite 
-----------+-------------
 Medvedev  | Russie
 Rublev    | Russie
 Khachanov | Russie

2- SELECT tennis.joueur.nationalite, COUNT(*) FROM tennis.joueur group by nationalite ORDER BY COUNT(*) DESC;
 nationalite | count 
-------------+-------
 Russie      |     3
 États-Unis  |     2
 Italie      |     2
 Espagne     |     2
 Grece       |     1
 Serbie      |     1
 Angleterre  |     1
 Australie   |     1
 Norvége     |     1
 Canada      |     1
 Allemagne   |     1
 Argentine   |     1
 Pologne     |     1
 Croatie     |     1

3- SELECT idTournoi, COUNT(*) FROM tennis.tournoi INNER JOIN tennis.match USING(idTournoi) GROUP BY idTournoi ORDER BY COUNT(*) DESC;
 idtournoi | count 
-----------+-------
         2 |     7
         1 |     7
         0 |     7
         3 |     3

4-SELECT joueur.nom, nationalite FROM tennis.joueur INNER JOIN tennis.tournoi on nationalite=pays;
   nom   | nationalite 
---------+-------------
 Nadal   | Espagne
 Alcaraz | Espagne
 Fritz   | États-Unis
 Tiafoe  | États-Unis

5- SELECT distinct nom, prenom FROM tennis.joueur INNER JOIN tennis.match on idJoueur=idGagnant;

     nom     |  prenom   
-------------+-----------
 Cilic       | Marin
 Schwartzman | Diego
 Alcaraz     | Carlos
 Khachanov   | Karen
 Nadal       | Rafael
 Tsitsipas   | Stefanos
 Ruud        | Casper
 Djokovic    | Novak
 Tiafoe      | Frances
 Zverev      | Alexander

6- SELECT DISTINCT idGagnant FROM tennis.match GROUP BY idGagnant HAVING COUNT(*) >1;
 idgagnant 
-----------
         4
         0
         6
         2
         1
         5

7- SELECT DISTINCT joueur.nom FROM tennis.joueur INNER JOIN tennis.match on idJoueur=idGagnant GROUP BY nom having COUNT (DISTINCT idTournoi) >1;
   nom   
---------
 Alcaraz
 Nadal
 Ruud
 Zverev

8- SELECT nom, COUNT(*) FROM tennis.joueur INNER JOIN tennis.match on idGagnant=idJoueur GROUP BY nom having COUNT(*)>1 ORDER BY nom DESC;
    nom    | count 
-----------+-------
 Zverev    |     2
 Tsitsipas |     2
 Ruud      |     4
 Nadal     |     4
 Djokovic  |     3
 Alcaraz   |     5






