/*The syntax to create a view. 
Note that to make a difference between table and view, it's better to prefix the name by "v_".
*/

CREATE VIEW v_nom_de_la_vue
AS
SELECT * FROM nom_table
WHERE...


-- the view can be use like a table.

SELECT * FROM v_nom_de_la_vue



/* Requêtes utiles 
Afficher la définition d'une vue */

SHOW CREATE VIEW v_nomvue 

/* Modifier une vue 
Solution 1 : */

ALTER VIEW v_nomvue  
AS  
[NOUVELLE REQUETE] 

-- Solution 2 : 
CREATE OR REPLACE VIEW v_nomvue 
AS 
[NOUVELLE REQUETE] 

-- Supprimer une vue 
DROP VIEW v_nomvue 

-- on peut spécifier l'option IF EXISTS : 
DROP VIEW IF EXISTS v_nomvue 

-- Définir des privilèges sur une vue 
GRANT  
CREATE VIEW,  
SHOW VIEW  
ON `nom_base`.* TO 'utilisateur'@'adresse_ip' 

-- Lister les vues existantes 
SELECT * FROM information_schema.views 