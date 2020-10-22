/* Réalisez les vues suivantes à partir de la base de données papyrus:  
1. v_GlobalCde correspondant à la requête : 
A partir de la table Ligcom, afficher par code produit, la somme des quantités commandées et le prix total correspondant : 
on nommera la colonne correspondant à  la somme des quantités commandées, QteTot et le prix total, PrixTot. 
*/

    --Initial query
    SELECT codart AS 'code produit', SUM(qtecde) AS QteTot, SUM(qtecde*priuni) AS PrixTot 
    FROM ligcom 
    GROUP BY codart;

    -- Query's view

    CREATE VIEW v_GlobalCde
    AS
    SELECT codart AS 'code produit', SUM(qtecde) AS QteTot, SUM(qtecde*priuni) AS PrixTot 
    FROM ligcom 
    GROUP BY codart;

    -- Query to display the view

    SELECT * FROM v_GlobalCde ;


/*2. v_VentesI100 correspondant à la requête : 
Afficher les ventes dont le code produit est le I100 (affichage de toutes les colonnes de la table Vente). 
*/
    --Initial query
    SELECT `codart`,`numfou`,`delliv`,`qte1`,`prix1`,`qte2`,`prix2`,`qte3`,`prix3`
    FROM vente 
    WHERE codart = 'I100' ; 

    -- Query's view

    CREATE VIEW v_VentesI100
    AS
    SELECT `codart`,`numfou`,`delliv`,`qte1`,`prix1`,`qte2`,`prix2`,`qte3`,`prix3`
    FROM vente 
    WHERE codart = 'I100' ;

    -- Query to display the view

    SELECT * FROM v_VentesI100 ;

/*3. A partir de la vue précédente, créez v_VentesI100Grobrigan 
remontant toutes les ventes concernant le produit I100 et le fournisseur 00120.
*/

    --Initial query
    SELECT `codart`,`numfou`,`delliv`,`qte1`,`prix1`,`qte2`,`prix2`,`qte3`,`prix3`
    FROM vente 
    WHERE codart = 'I100' 
    AND numfou = '120' ;

    -- Query's view

    CREATE VIEW v_VentesI100Grobrigan
    AS
    SELECT `codart`,`numfou`,`delliv`,`qte1`,`prix1`,`qte2`,`prix2`,`qte3`,`prix3`
    FROM vente 
    WHERE codart = 'I100' 
    AND numfou = '120' ;

    -- Query to display the view

    SELECT * FROM v_VentesI100Grobrigan ;

