--BEFORE TO USE, IMPORT papyrus_database.sql

--LES BESOINS D'AFFICHAGE

/*1 
Quelles sont les commandes du fournisseur 09120?
*/
SELECT *
FROM entcom
WHERE numfou = 9120

/*2
Afficher le code des fournisseurs pour lesquels des commandes ont été passées
*/
SELECT DISTINCT numfou
FROM entcom

/*3 Afficher le nombre de commandes fournisseurs passées, et le nombre de fournisseur concernés.
SELECT COUNT(numcom) AS com_pass, COUNT(DISTINCT numfou) AS fou_concern
FROM entcom

/*4 
Editer les produits ayant un stock inférieur ou égal au stock d'alerte 
et dont la quantité annuelle est inférieur est inférieure à1000
(informations à fournir : n° produit, libelléproduit, stock, stockactuel d'alerte, quantitéannuelle 
*/
SELECT codart, libart,stkale,stkphy,qteann
FROM produit
WHERE 1 = 1 
AND stkale >= stkphy
AND qteann < 1000

/* 5
Quels sont les fournisseurs situés dans les départements  75 78 92 77 ?
L’affichage (département, nom fournisseur) sera effectué par département décroissant, 
puis par ordre alphabétique
*/
SELECT nomfou, posfou
FROM fournis
WHERE 1 =! 1
OR posfou LIKE '75%'
OR posfou LIKE '78%'
OR posfou LIKE'92%'
OR posfou LIKE'77%'
ORDER BY posfou DESC, nomfou ASC 

/* 6
Quelles sont les commandes passées au mois de mars et avril?
*/
SELECT entcom.numcom, entcom.datcom, ligcom.derliv
FROM ligcom
JOIN entcom ON ligcom.numcom = entcom.numcom
WHERE MONTH(derliv) = 03
OR MONTH(derliv) = 04

/* 7
Quelles sont les commandes du jourqui ont des observations particulières ?
(Affichage numéro de commande, date de commande)
*/
SELECT numcom, obscom, datcom
FROM entcom 
WHERE obscom != ""

/* 8
Listerle total de chaque commande par total décroissant 
(Affichage numéro de commande et total)
*/
SELECT numcom, SUM(qtecde * priuni) AS total
FROM ligcom 
GROUP BY numcom
ORDER BY total DESC 

/* 9
Lister les commandesdont le total est supérieur à 10000€; on exclura dans le 
calcul du total les articles commandés en quantité supérieure ou égale à 1000.
(Affichage numéro de commande et total)
*/
SELECT numcom, SUM(qtecde*priuni) AS total
FROM ligcom
WHERE qtecde<1000
GROUP BY numcom
HAVING total >10000

/* 10
Lister les commandes par nom fournisseur 
(Afficher le nom du fournisseur, le numéro de commande et la date)
*/
SELECT fournis.nomfou, entcom.numcom, entcom.datcom
FROM fournis
JOIN entcom ON entcom.numfou = fournis.numfou

/* 11
Sortir les produits des commandes ayant le mot "urgent' en observation?
(Afficher le numéro de commande, le nom du fournisseur, 
le libellé du produit et le sous total= quantité commandée * Prix unitaire)
*/
SELECT entcom.numcom AS 'numéro de commande', fournis.nomfou AS 'nom du fournisseur', ligcom.codart AS 'libellé du produit', ligcom.qtecde*ligcom.priuni AS sous_total
FROM entcom
JOIN fournis ON fournis.numfou = entcom.numfou
JOIN ligcom ON ligcom.numcom = entcom.numcom
WHERE entcom.obscom 
  LIKE '%urgent%'

/* 12
Coder de 2manières différentes la requête suivante:
Lister le nom desfournisseurs susceptibles de livrer au moins un article
*/
SELECT DISTINCT fournis.nomfou AS 'Fournisseur suceptible de livrer'
FROM fournis
JOIN entcom ON entcom.numfou = fournis.numfou
JOIN ligcom ON ligcom.numcom = entcom.numcom
WHERE qteliv > 0 -- or != 0

/* 13
Coder de 2 manières différentes la requête suivanteLister les commandes (Numéro et date) 
dont le fournisseur est celui de la commande 70210
*/
SELECT entcom.numcom, entcom.datcom
FROM entcom
JOIN ligcom ON entcom.numcom = ligcom.numcom
WHERE ligcom.numcom = 70210

/* 14
Dans les articles susceptibles d’être vendus, lister les articles moins chers (basés sur Prix1) 
que le moins cher des rubans (article dont le premier caractère commence par R). 
On affichera le libellé de l’article et prix1
*/
SELECT produit.libart AS "libellé de l'article", vente.prix1
FROM vente
JOIN produit ON produit.codart = vente.codart
where vente.prix1< ALL
  (SELECT vente.prix1
  FROM vente
  WHERE codart LIKE 'R%');

/* 15
Editer la liste des fournisseurs susceptibles de livrer les produits 
dont le stock est inférieur ou égal à 150 % du stock d'alerte. 
La liste est triée par produit puis fournisseur
*/ 
SELECT fournis.nomfou AS fournisseur, produit.libart AS produit
FROM fournis
JOIN vente ON vente.numfou = fournis.numfou
JOIN produit ON produit.codart = vente.codart
WHERE (produit.stkphy*1.5) <= stkale
ORDER BY produit ASC, fournisseur

/* 16
Éditer la liste des fournisseurs susceptibles de livrer les produit 
dont le stock est inférieur ou égal à 150 % du stock d'alerte 
et un délai de livraison d'au plus 30 jours. 
La liste est triée par fournisseur puis produit
*/
SELECT fournis.nomfou AS fournisseur, produit.libart AS produit
FROM fournis
JOIN vente ON vente.numfou = fournis.numfou
JOIN produit ON produit.codart = vente.codart
WHERE (produit.stkphy*1.5) <= stkale
AND vente.delliv <= 30
ORDER BY fournisseur, produit

/* 17
Avec le même type de sélection que ci-dessus, 
sortir un total des stocks par fournisseur trié par total décroissant
*/
SELECT fournis.nomfou AS fournisseur, SUM(produit.stkphy) AS total
FROM fournis
JOIN vente ON vente.numfou = fournis.numfou
JOIN produit ON produit.codart = vente.codart
WHERE (produit.stkphy*1.5) <= stkale
AND vente.delliv <= 30
GROUP BY fournisseur 
ORDER BY total DESC

/* 18
En fin d'année, sortir la liste des produits dontla quantité réellement commandée 
dépasse 90% de la quantité annuelleprévue.
*/
SELECT produit.*, ligcom.qtecde
FROM produit
JOIN ligcom ON ligcom.codart = produit.codart
WHERE ligcom.qtecde>(produit.qteann*0.9)

/* 19
Calculer le chiffre d'affaire par fournisseur 
sachant que les prix indiqués sont hors taxes et que le taux de TVA est 20%.
*/
SELECT fournis.nomfou AS fournisseur, SUM(ligcom.qtecde*ligcom.priuni)*1.2 AS "chiffre d'affaire"
FROM fournis
JOIN entcom ON entcom.numfou = fournis.numfou
JOIN ligcom ON ligcom.numcom = entcom.numcom
GROUP BY fournis.nomfou

--LES BESOINS DE MISE A JOUR

/*1
Application d'une augmentation de tarif de 4% pour le prix 1, 
2% pour le prix2 pour le fournisseur 91800
*/
UPDATE vente
SET prix1 = prix1*1.04,
prix2 = prix2*1.02
WHERE numfou = 9180

/*2
Dans la table vente, mettre à jour le prix2 des articles 
dont le prix2 est null, en affectant la valeur de prix1.
*/
UPDATE vente
SET prix2 = prix1
WHERE prix2 = 0

/*3
Mettre à jour le champ obscom en positionnant  '*****' pour toutes les commandes 
dont le fournisseur a un indice de satisfaction <5
*/
UPDATE entcom
JOIN fournis ON fournis.numfou = entcom.numfou
SET obscom = '*****'
WHERE satisf <5

/*4
Suppression du produit I110
*/
DELETE FROM vente -- dans clé étrangère en premier
WHERE codart = 'I110'
DELETE FROM produit -- puis dans clé primaire
WHERE codart = 'I110'

-- /*5
-- Suppression des entête de commande qui n'ont aucune ligne
-- TODO: A voir avec isabelle*/
-- DELETE FROM entcom, ligcom
-- USING entcom
-- JOIN ligcom ON ligcom.numcom = entcom.numcom
-- WHERE entcom.obscom = "";