/* Une procédure stockée agit comme une fonction. 
Elle permet d'encapsuler des instructions en vue d'une exécution répétitive.

Création d'une procédure stockée avec un SELECT sans paramètre :
*/
    DELIMITER | 
        /* On modifie le délimiteur initial ; en le remplacant par |. 
        Il est différent du delimiteur initial (;) car sinon cela provoquerait une erreur 
        => le point-virgule termine une instruction 
        A noter qu'il peut être optionnel selon l'interface comme pour Heidi*/

    CREATE PROCEDURE listeClient() -- Ici on donne le nom à notre procédure stockée
    BEGIN -- marque le début où l'on va écrire le(s) requête(s)
        SELECT cli_id, cli_nom, cli_prenom, cli_ville 
        FROM client;
    END | -- marque la fin de l'écriture de(s) requête(s)

    /* On rétablit le délimiteur initial */
    DELIMITER ;

    -- L'appel de la procédure.
        CALL listeClient;


-- Création d'une procédure stockée avec un SELECT avec un paramètre :
    DELIMITER |

    CREATE PROCEDURE listeClientParVille(In ville Varchar(50))
    -- Ici on demande une ville en paramètre de la procédure
    BEGIN
        SELECT cli_id, cli_nom, cli_prenom, cli_ville 
        FROM client
        WHERE cli_ville = @ville; -- '@' doit être préfixé pour l'utilisation du paramètre
        -- A noter que le @ va dépendre de la version de MySQL
    END |

    DELIMITER ;

    -- Appel de la procédure stockée avec le paramètre voulu :
        CALL listeClientParVille('Londre')

-- Création d'une procédure stockée avec un INSERT INTO avec plusieurs paramètres :
	
    DELIMITER |

    CREATE PROCEDURE ajoutClient(
        In nom varchar (50), 
        In prenom varchar (50), 
        In ville varchar (50)
    )
    BEGIN
        INSERT INTO client (cli_nom, cli_prenom, cli_ville) VALUES (@nom, @prenom, @ville);
    END |

    DELIMITER ;

    /* Appel de la procédure avec les paramètres voulus: 
    (bien respecter l'ordre des paramètres par rapport à la procédure)*/
    CALL ajoutClient('Jessica', 'Pikatchien', 'Dunkerque')


-- Lister les procédures stockées :

    SHOW PROCEDURE STATUS;

-- Supprimer une procédure :

    DROP PROCEDURE nom_procedure;

