-- Pour créer un utilisateur
CREATE USER IF NOT EXISTS 'nom_utilisateur'@'adresse_ip' IDENTIFIED BY 'mot_de_passe';
-- qui signifie créer un utilisateur nommé nom_utilisateur autorisé à se connecter depuis l'adresse IP (ordinateur) 
-- indiquée et identifié par le mot de passe renseigné. Dans la grande majorité des cas, 'adresse_ip' 
-- aura pour valeur localhost, c'est-à-dire l'équivalent de l'adresse IP 127.0.0.1

-- Exemple : 

CREATE USER IF NOT EXISTS 'jean_beaunot'@'%' IDENTIFIED BY 'Sau6sson@'
-- A noter ici que l'on peut remplacer par le caractère '%' pour spécifier toutes les adresses IP.

-- Pour afficher la liste des utilisateurs existants : 
SELECT user FROM mysql.user 

-- Pour afficher l'utilisateur courant 
SHOW current_user() -- version 8 MySQL
SELECT user(); -- Version antérieur 

-- Pour changer le mot de passe
ALTER USER 'jean_beaunot'@'%' IDENTIFIED BY 'Sau6sson7Que@' -- Syntaxe recommandé depuis MySQL8
SET PASSWORD FOR 'jean_beaunot'@'%' = PASSWORD('Sau6sson7Que@') -- Pour les versions antérieures. 'PASSWORD' permet le hachage du mot de passe

-- Recommer un utilisateur
RENAME USER 'jean_beaunot'@'%' TO 'Poe_piette'@'%' -- La commande conserve le mdp, les privilèges et le rôle

-- Pour supprimer un utilisateur
DROP USER 'Poe_piette'@'%'


-- ATTRIBUTION DES PRIVILEGES :

/* 3 niveaux de pricilèges:
-> 1 : manipulation des données
-> 2 : gestion d'une base
-> 3 : administration du serveur

On peut ainsi autoriser ou interdire à un utilisateur :

    -> de lire, insérer, modifier ou supprimer des données sur certaines tables
    -> d'effectuer des actions sur le schéma (structure des tables, colonnes) d'une base
    -> d'exécuter, créer, modifier ou supprimer des vues, procédures stockées, déclencheurs, transactions
    -> de gérer d'autres utilisateurs, rôles et privilèges.
*/
-- Attribution de tous les droits sur une base de données :
GRANT ALL PRIVILEGES ON nom_de_la_base.*
TO 'utilisateur'@'adresse_ip' 
IDENTIFIED BY 'mot_de_passe'

-- Exemple :
GRANT ALL PRIVILEGES ON papyrus.*
TO 'Poe_piette'@'%' 
IDENTIFIED BY 'Sau6sson7Que@'

-- Pour affecter des droits 
GRANT privilege 
ON objet 
TO utilisateur;
/*
-> Valeur possibles pour privilege : SELECT, INSERT, DELETE, UPDATE, CREATE, DROP... https://dev.mysql.com/doc/refman/8.0/en/grant.html
-> objet : nom_base.nomtable (exemple: papyrus.fournis)
-> utilisateur : nom de l'utilisateur
*/

-- Exemple : 
GRANT SELECT 
ON papyrus.fournis 
TO Poe_piette
IDENTIFIED BY 'Sau6sson7Que@'

-- A noter que l'on peut attribuer plusieurs privilèges en même temps
GRANT SELECT, INSERT, UPDATE 
ON papyrus.vente
TO Poe_piette
IDENTIFIED BY 'Sau6sson7Que@'