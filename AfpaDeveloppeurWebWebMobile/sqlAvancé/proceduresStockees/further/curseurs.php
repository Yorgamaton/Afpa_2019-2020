<p class="text-light">Lorsque plusieurs lignes sont retournées par une requête SELECT, On va alors utiliser des curseurs :</p>

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger bg-light my-2" data-toggle="modal" data-target="#curseur">Voir l'exemple</button>

<!-- Modal -->
<div class="modal fade" id="curseur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <pre class="pre"><code class="language-SQL">CREATE PROCEDURE liste_membres()
BEGIN
    DECLARE var_identifiant VARCHAR(64);
    DECLARE var_mot_passe VARCHAR(32);
    -- Ici on créer un curseur qui va chercher l'identifiant et le mote de passe dans la table membres de la BDD
    DECLARE curseur1 CURSOR FOR SELECT identifiant, mot_passe FROM membres;

    -- Il faut ensuite ouvrir le curseur pour utiliser les données
    OPEN curseur1; # ouverture du curseur1

    # première ligne du résultat
    -- FETCH permet de lire la ligne courante et de passer à la suivante
    FETCH curseur1 INTO var_identifiant, var_mot_passe;
    SELECT var_identifiant, var_mot_passe;

    # seconde ligne du résultat
    FETCH curseur1 INTO var_identifiant, var_mot_passe;
    SELECT var_identifiant, var_mot_passe;

    # troisième ligne du résultat
    FETCH curseur1 INTO var_identifiant, var_mot_passe;
    SELECT var_identifiant, var_mot_passe;

    CLOSE curseur1; # fermeture du curseur1
END;</code></pre>
            </div>
        </div>
    </div>
</div> <!-- Fin Modal -->

<p class="text-light">On notera que cette structure ne récupère que les trois premiers utilisateurs. Pour se faire, on va utiliser une boucle : </p>

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger bg-light my-2" data-toggle="modal" data-target="#curseurBoucle">Voir l'exemple</button>

<!-- Modal -->
<div class="modal fade" id="curseurBoucle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <pre class="pre"><code class="language-SQL">DELIMITER |
#Exemple de procédure qui liste les membres d'une table
CREATE PROCEDURE Liste_Membres()
BEGIN
    DECLARE done INT DEFAULT 0;
    DECLARE var_identifiant VARCHAR(64);
    DECLARE var_mot_passe VARCHAR(32);
    DECLARE curseur1 CURSOR FOR SELECT identifiant, mot_passe FROM membres;
    DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;

    OPEN curseur1; # ouverture du curseur1
    -- On va créer une boucle pour afficher l'ensemble des lignes présentes dans la requête
    REPEAT
            FETCH curseur1 INTO var_identifiant, var_mot_passe;
            IF done = 0 THEN
                    SELECT var_identifiant, var_mot_passe;
            END IF;
    UNTIL done
    END REPEAT;

    CLOSE curseur1; # fermeture du curseur1
END|
DELIMITER ;</code></pre>
            </div>
        </div>
    </div>
</div> <!-- Fin Modal -->