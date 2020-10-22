/* !!! IMPORTANT !!!

Les déclencheurs ne peuvent s'appliquer que sur des tables dont le moteur de stockage est transactionnel. 
Depuis MySQL 5.5, le moteur de stockage par défaut lorsqu'une table est créée est InnoDB (qui supporte les transactions).
L'autre moteur de stockage le plus utilisé, mais qui ne supporte pas les transactions, est MyIsam. 
Si vous vous retrouvez dans le second cas, alors vous devrez changer le moteur de stockage.
https://www.supinfo.com/articles/single/44-etude-plusieurs-moteurs-stockage-mysql

Pour ce faire, la requête devra respecter la syntaxe suivante : 
*/
ALTER TABLE nom_table ENGINE=nom_du_moteur

-- Dans notre cas :

ALTER TABLE nom_table ENGINE=InnoDB

-- Pour lister les moteurs de stockage disponible :
SHOW ENGINES;

-- Pour créer une table avec spécification : 
CREATE TABLE utilisateur(
        id        Int(11) Auto_increment NOT NULL ,
        username  Varchar(50) NOT NULL ,
        password  Varchar(255) NOT NULL ,
        PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8; -- C'est à cette ligne que l'on précise le moteur de stockage

Deux familles de moteur :
    -- 1. Transctionnel : 
        -- Un moteur transactionnel est sécurisant puisqu'il vérifie que l'opération sur la base de donnée est effectuée du début à la fin.
        -- A noter que l'on peut récupérer les données d'une transaction envoyée durant une coupure électrique. 
    -- 2. non-transactionnel : 
        -- Ont un avantage en terme de ressources matérielles. C'est à dire qu'ils consomment moins de mémoire 
        -- pour une même opération. Ils sont également plus rapide du fait les transactions ne sont pas vérifiées de la même manière.

-- DEFINITION

    /* Un trigger (ou déclencheur) se définit comme une procédure stockée spéciale qui permet d'accomplir une (ou des) action(s) 
    avant ou après que des données soient insérées (INSERT), mises à jour (UPDATE) ou supprimées (DELETE) dans la base. 
    Ils permettent donc la mise en place de règles de gestion (conditions) 
    ainsi que d'assurer l'intégrité (cohérence) des donnnées.
    */

    /* !!! IMPORTANT !!!
    Dans d'autres systèmes de bases de données (SQL Server, Oracle, PostGres), 
    il est possible d'effecuer une commande d'annulation (instruction ROLLBACK),
    dans un trigger, mais pas dans MySql ce qui pose un problème lorsqu'on veut effectuer ce type d'opération. 
    Il existe néanmoins des alternatives plus ou moins pratiques. 
    */

-- CREATION D'UN DECLENCHEUR :

CREATE TRIGGER nom 
[MOMENT] [EVENEMENT]  
ON [table] 
FOR EACH ROW
BEGIN
    -- [requête] 
END

-- CAS PRATiQUE (utilisez le script commande-produit.sql)

/*
Dans cette base de données, la table commande possède un champ total pour stocker le total de la commande.
Lorsque vous ajoutez ou modifiez des produits dans la commande (avec la table lignedecommande), 
vous devez penser à recalculer le total de la commande et mettre à jour le champ total.
C'est exactement pour ca que les déclencheurs ont été créés.
Nous pourrions mettre en place un déclencheur que la table table lignedecommande, 
qui va se charger de recalculer le total puis mettre à jour la table commande.
*/

-- Travail à réaliser :

    --  Mettez en place ce trigger, puis ajoutez un produit dans une commande, vérifiez que le champ total est bien mis à jour.

    DELIMITER |

    CREATE TRIGGER maj_total_insert AFTER INSERT ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
        UPDATE commande SET total=tot WHERE id=id_c; -- on stock le total dans la table commande
    END|

    DELIMITER ;

    -- Requête testée : La modification dans la table 'commande' est bien réalisée
    INSERT INTO lignedecommande VALUES (1, 5, 2, 10)


    -- Ce trigger ne fonctionne que lorsque l'on ajoute des produits, les modifications ou suppressions ne permettent pas de recalculer le total. Comment pourrait-on faire ?
        
        -- Modification 
            DELIMITER |

            CREATE TRIGGER maj_total_update  AFTER UPDATE ON lignedecommande
            FOR EACH ROW 
            BEGIN
                DECLARE id_c INT;
                DECLARE tot DOUBLE;
                SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
                SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
                UPDATE commande SET total=tot WHERE id=id_c; -- on stock le total dans la table commande
            END|

            DELIMITER ;
            -- Requête testée : 
            UPDATE lignedecommande SET `quantite`= 4 WHERE `id_commande` = 3 AND `id_produit` = 3;

        -- Supprimer

            DELIMITER |

            CREATE TRIGGER maj_total_delete  AFTER DELETE ON lignedecommande
            FOR EACH ROW 
            BEGIN
                DECLARE id_c INT;
                DECLARE tot DOUBLE;
                SET id_c = OLD.id_commande; -- nous captons le numéro de commande concerné
                SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
                UPDATE commande SET total=tot WHERE id=id_c; -- on stock le total dans la table commande
            END|

            DELIMITER ;

    -- Un champ remise était prévu dans la table commande. Comment pourrait-on le prendre en compte ?

    DELIMITER |

    CREATE TRIGGER maj_total_insert_remise AFTER INSERT ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(lignedecommande.prix*lignedecommande.quantite)*(commande.remise/100) FROM lignedecommande JOIN commande ON id = id_commande WHERE id_commande=id_c); -- on recalcul le total
        UPDATE commande SET total=tot WHERE id=id_c; -- on stock le total dans la table commande
    END|

    DELIMITER ;