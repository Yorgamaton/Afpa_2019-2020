/* EXERCICE 1
Sous PhpMyAdmin, après avoir sélectionné votre base Papyrus codez le script suivant et exécutez-le : 
*/
	
    START TRANSACTION;
	
    SELECT nomfou FROM fournis WHERE numfou=120;
	
    UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120 ;
	
    SELECT nomfou FROM fournis WHERE numfou=120;

/* Executez ces instructions ligne par ligne !

L'instruction START TRANSACTION est suivie d'une instruction UPDATE, mais aucune instruction COMMIT ou ROLLBACK correspondante n'est présente.

    Que concluez-vous ?*/
    -- Que l'on peut effectuer encore effectuer un ROLLBACK et revenir en arrière ou alors valider le changement en effectuant un COMMIY

    -- Les données sont-elles modifiables par d'autres utilisateurs (ouvrez une nouvelle fenêtre de requête pour interroger le fournisseur 120 par une instruction SELECT) ?
    OUI
    -- La transaction est-elle terminée ?
    OUI

    -- Comment rendre la modification permanente ?

    START TRANSACTION;

    UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120 ;

    COMMIT;

    -- Comment annuler la transaction ?

    START TRANSACTION;
    
    UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120 ;

    ROLLBACK;

/*Codez les instructions nécessaires dans chaque cas pour vérifier vos réponses.  
