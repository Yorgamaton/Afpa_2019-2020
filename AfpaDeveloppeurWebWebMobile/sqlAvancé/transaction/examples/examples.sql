-- Une transaction est définie comme un ensemble cohérent de modifications faites sur les données 
-- et permet de garantir l'intégrité de la base de données.
-- Elle est caractérisé par les critères A.C.I.D.:
    -- 1. Atomique : si une des instructions échoue, toute la transation échoue
    -- 2. Cohérente : car la base de données est dans un état cohérent avant et après la transaction, c'est à dire respectant les règles de structuration énoncées.
    -- 3. Isolée : les données sont verrouillées : il n'est pas possible depuis une autre transaction de cisualiser les données en cours de modificaion dans une transaction.
    -- 4. Durable : les modifications apportées à la nase de données par une transaction sont validées. 

-- PHASE 1 : 

    -- EXEMPLE 1 : débit & crédit simultanés

        START TRANSACTION; -- Permet de lancer la transaction
        UPDATE comptes SET debit = debit-100 WHERE compte_id = 1; -- 1ère requête qui débite le compte de 100€
        UPDATE comptes SET credit = credit+100 WHERE compte_id = 2; -- 2nd requête qui crédite le compte de 100€

        -- Ici, deux possibilités existent :
            -- 1. Il y a aucune erreur : il faut alors valider les modifications dans la base de données à l'aide de l'instruction COMMIT
            -- 2. Il y a un erreur : Il faut alors annuler les modifications des autres requêtes qui ont, quant à elle, fonctionné. 
                -- Cela se fera à l'aide de l'instruction ROLLBACK. 
    
    -- EXEMPLE 2 : procédure stockées

        -- Une transaction peut faire appel à une procédure stockée :
        START TRANSACTION;
        CALL debit(100, 1);
        CALL credit(100, 2);