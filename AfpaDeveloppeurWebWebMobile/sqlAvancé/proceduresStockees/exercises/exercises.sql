/* EXERCICE N°1: création d'une procédure stockée sans paramètre


Créez la procédure stockée Lst_fournis afficher le code des fournisseurs 
pour lesquels une commande a été passée.
*/
    DELIMITER |

    CREATE PROCEDURE lst_fournis()
    BEGIN
        SELECT DISTINCT numfou 
        FROM entcom ;    
    END |

    DELIMITER ;
-- Exécutez la pour vérifier qu’elle fonctionne conformément à votre attente.

    CALL lst_fournis();
    --IT'S WORK !!!!
    
-- Exécutez la commande SQL suivante pour obtenir des informations sur cette procédure stockée :
    SHOW CREATE PROCEDURE lst_fournis;

/* Exercice 2 : création d'une procédure stockée avec un paramètre en entrée

Créer la procédure stockée Lst_Commandes, qui liste les commandes 
ayant un libellé particulier dans le champ obscom. 
*/

    DELIMITER |

    CREATE PROCEDURE Lst_Commandes(IN libelle Varchar(50))
    BEGIN   
        SELECT numcom, obscom, datcom, numfou
        FROM entcom
        WHERE obscom = libelle ;
    END |
                 
    DELIMITER ;

    -- Call for the strored procedure with a parameter
    CALL Lst_Commandes('Commande urgente');
    CALL Lst_Commandes('Commande cadencée');
    CALL Lst_Commandes(''); -- to get rows where there are no entries

/* Exercice 3 : création d'une procédure stockée avec plusieurs paramètres

Créer la procédure stockée CA_ Fournisseur, qui pour un code fournisseur et une année entrée en paramètre,
calcule et restitue le CA potentiel de ce fournisseur pour l'année souhaitée.

On exécutera la requête que si le code fournisseur est valide, c'est-à-dire dans la table FOURNIS.

Testez cette procédure avec différentes valeurs des paramètres. */

    DELIMITER |

    CREATE PROCEDURE CA_Fournisseur (
        IN cod_fou int(11),
        IN annee int(4)
        )
    BEGIN   
        SELECT fournis.nomfou AS founisseur, SUM(ligcom.qtecde*ligcom.priuni) AS 'CA potentiel'
        FROM fournis
        JOIN entcom ON entcom.numfou = fournis.numfou
        JOIN ligcom ON ligcom.numcom = entcom.numcom
        WHERE fournis.numfou = cod_fou
        AND YEAR(entcom.datcom) = annee
        GROUP BY fournis.nomfou ;
    END |

    DELIMITER ;

    CALL CA_Fournisseur('120', '2007');

    DROP PROCEDURE CA_Fournisseur ;

