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
        IF newStkale >= 5
        RETURN;

        IF newStkale < 5
                DECLARE diffStkale INT;
                SET diffStkale = oldStkale - newStkale;
                UPDATE produit SET stkale = diffStkale;
                INSERT INTO lignedecommande (codart, qte) VALUES (codeart, diffStkale);
        END IF;
        
        IF oldStkale < 5 AND newStkale < 5
                DECLARE actQte INT;
                DECLARE diffqteale INT;
                SET actQte = (SELECT commander_articles.qte FROM commander_articles JOIN produit ON codart = codart WHERE codart = codeart);
                SET diffqteale = actQte - newStkale;
                UPDATE lignedecommande SET qte = diffqteale;
        END IF ;
    END |

    DELIMITER ;