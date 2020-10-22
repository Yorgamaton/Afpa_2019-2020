/*
Créez trois utilisateurs util1, util2, util3

util1 doit pouvoir effectuer toutes les actions */
GRANT ALL PRIVILEGES ON papyrus.*
TO 'util1'@'%' 
IDENTIFIED BY '1234ABCD'

/*
util2 ne peut que sélectionner les informations dans la base 
*/
GRANT SELECT ON papyrus.*
TO 'util2'@'%' 
IDENTIFIED BY '1234ABCD'

/*
util3 n'a aucun droit sur la base de données, sauf d'afficher la table fournis
*/
GRANT SELECT ON papyrus.fournis
TO 'util3'@'%' 
IDENTIFIED BY '1234ABCD'
