/*
Créer une table COMMANDER_ARTICLES (CODART, QTE, DATE)

    CODART : code de l'article (cf. table produit)
    DATE : date du jour (par défaut)
    QTE : à calculer
*/
    CREATE TABLE commander_articles
    (
        codart CHAR(4),
        date DATETIME DEFAULT CURRENT_TIMESTAMP,
        qte int,
        FOREIGN KEY (codart) REFERENCES produit(codart)
    )
-- Créer un déclencheur after_produit_update sur la table produit : 
    -- lorsque le stock physique devient inférieur au stock d'alerte, 
    -- une nouvelle ligne est insérée dans la table COMMANDER_ARTICLES;

    -- Pour le jeu de test, on prendra le produit 'B001', on mettra stkale = 5 et stkphy = 20. 
            UPDATE `produit` SET `stkale`=5,`stkphy`=20 WHERE codart = 'B001';

    /*Pour comprendre le problème :
    Cas 	Stock physique 	                    Résultat

    Cas 1 	On passe le stock physique à 6. 	Le stock physique reste supérieur au stock d'alerte, le trigger n'est pas exécuté.

    Cas 2 	On passe le stock physique à 4. 	Le stock physique est inférieur au stock d'alerte, nous devons recommander des produits. 
                                                Le trigger va s'exécuter et insérer une ligne dans la table COMMANDER_ARTICLES 
                                                avec QTE = (stock alerte - stock physique) = 1

    Cas 3 	On passe le stock physique à 3. 	Le stock physique est inférieur au stock d'alerte, nous devons recommander des produits. 
                                                Le trigger va s'exécuter et mettre à jour dans la table COMMANDER_ARTICLES la quantité à recommander 
                                                pour la ligne déjà créée pour le produit 'B001' avec une vlaeur de 2 (5 - 3).
    */

    DELIMITER |

    CREATE TRIGGER after_produit_update  AFTER UPDATE ON produit
    FOR EACH ROW
    BEGIN
        DECLARE newStkale INT; 
        DECLARE oldStkale INT; 
        DECLARE codeart CHAR;
        SET newStkale = NEW.stkale;
        SET oldStkale = OLD.stkale;
        SET codeart = (SELECT codart FROM produit);
        IF newStkale < 5
            BEGIN
                DECLARE diffStkale INT;
                SET diffStkale = oldStkale - newStkale;
                    UPDATE produit SET stkale = diffStkale;
                    INSERT INTO lignedecommande (codart, qte) VALUES (codeart, diffStkale);
            END ;
        END IF;
        IF oldStkale < 5 AND newStkale < 5
            BEGIN
                DECLARE actQte INT;
                DECLARE diffqteale INT;
                SET actQte = (SELECT commander_articles.qte FROM commander_articles JOIN produit ON codart = codart WHERE codart = codeart);
                SET diffqteale = actQte - newStkale;
                UPDATE lignedecommande SET qte = diffqteale;
            END;
        END IF;
    END |

    DELIMITER ;