--BEFORE TO USE, import exemple_database.sql

--SELECT

--1 Afficher toutes les informations concernant les employés
SELECT * 
FROM employe

--2 Afficher toutes les informations concernant les départements.  
SELECT nodept 
FROM employe

/*3 Afficher le nom, la date d'embauche, le numéro du supérieur, 
le numéro de département et le salaire de tous les employés. 
*/
SELECT nom,dateemb,nosup,nodept,salaire 
FROM employe 


-- for change the name of the column temporarily
SELECT nom AS Employe 
FROM employe 
--or To put an accent, have to use quote
SELECT nom AS 'Employé' 
FROM employe


--DELETE DUPLICATE ENTRIES

--4 Afficher le titre de tous les employés. 
SELECT titre 
FROM employe 

--5 Afficher les différentes valeurs des titres des employés. 
SELECT DISTINCT titre 
FROM employe 


--RESTRICTIONS

/*6  Afficher le nom, le numéro d'employé et le numéro du 
département des employés dont le titre est «Secrétaire». 
*/
SELECT nom,noemp,nodept 
FROM employe 
WHERE 1 = 1
  AND titre= 'secretaire'

/*7 Afficher le nom et le numéro de département 
dont le numéro de département est supérieur à 40.
*/
SELECT nom,nodept 
FROM dept 
WHERE 1 = 1
  AND nodept >40


--Restrictions by comparing colummns

/*8 Afficher le nom et le prénom des employés dont le nom est 
alphabétiquement antérieur au prénom.
*/
SELECT nom,prenom 
FROM employe 
WHERE 1 = 1
  AND nom<prenom -- use > to have the opposite

/*9 Afficher le nom, le salaire et le numéro du département des employés 
dont le titre est «Représentant», le numéro de département est 35et 
le salaire est supérieur à 20000.
*/
SELECT nom,salaire,nodept 
FROM employe 
WHERE 1 = 1
  AND titre = 'representant' 
  AND nodept =35 
  AND salaire>20000

/*10 Afficher le nom, le titre et le salaire des employés dont le titre est 
«Représentant» ou dont le titre est «Président». 
*/
SELECT nom,salaire,titre 
FROM employe 
WHERE  1!= 1
  OR titre = 'representant' 
  OR titre = 'president'

/*11 Afficher le nom, le titre, le numéro de département, 
le salaire des employés du département 34, 
dont le titre est «Représentant» ou «Secrétaire». 
*/
SELECT nom,titre,salaire,nodept 
FROM employe 
WHERE 1 = 1
  AND nodept =34 
  AND (titre ='representant' OR titre ='secretaire')

/*12 Afficher le nom, le titre, le numéro de département, 
le salaire des employés dont le titre est Représentant, 
ou dont le titre est Secrétaire dans le département numéro 34. 
*/ 
SELECT nom,titre,salaire,nodept 
FROM employe 
WHERE 1 != 1
  OR titre ='representant' 
  OR (nodept =34 AND titre ='secretaire')


--DENIAL, CLOSE RESEARCH 

--15 Afficher le nom des employés commençant par la lettre «H».
SELECT nom 
FROM employe 
WHERE 1 = 1
  AND nom 
LIKE 'H%' --% is a joker to replace all characters after or before the letter

--16 Afficher le nom des employés se terminant par la lettre «n».
SELECT nom 
FROM employe 
WHERE 1 = 1
  AND nom 
LIKE '%n'

--17 Afficher le nom des employés contenant la lettre «u» en 3ème position. 
SELECT nom 
FROM employe 
WHERE 1 = 1
  AND nom 
LIKE '__u%' -- "_" is a joker too, but representing only once letter (compare to %)

/*18 Afficher le salaire et le nom des employés du service 41
classés par salaire croissant. 
*/
SELECT nom,salaire 
FROM employe 
WHERE 1 = 1
  AND nodept = 41 
ORDER BY salaire ASC -- use "ASC" to order from min to max 

/*19 Afficher le salaire et le nom des employés du service 41
classés par salaire décroissant. 
*/
SELECT nom,salaire 
FROM employe 
WHERE 1 = 1
  AND nodept = 41 
ORDER BY salaire DESC -- use "DESC" to order from min to max 

/*20 Afficher le titre, le salaire et le nom des employés 
classés par titre croissant et par salaire décroissant. 
*/
SELECT titre,salaire,nom 
FROM employe 
ORDER BY titre ASC, salaire DESC 


--VALUES NOT ENTERED

/*21 Afficher le taux de commission, le salaire et le nom des employés 
classés par taux de commission croissante
*/
SELECT tauxcom,salaire,nom 
FROM employe 
ORDER BY tauxcom ASC 

/*22 Afficher le nom, le salaire, le taux de commission et le titre des employés 
dont le taux de commission n'est pas renseigné.
*/
SELECT tauxcom,salaire,nom 
FROM employe 
WHERE 1 = 1 
  AND tauxcom IS NULL 
ORDER BY tauxcom ASC 

/*23 Afficher le nom, le salaire, le taux de commission et le titre des employés 
dont le taux de commission est renseigné. 
*/
SELECT tauxcom,salaire,nom 
FROM employe 
WHERE 1 = 1
  AND tauxcom IS NOT NULL 
ORDER BY tauxcom ASC 

/*24 Afficher le nom, le salaire, le taux de commission, le titre des employés 
dont le taux de commission est inférieur à 15
*/
SELECT tauxcom,salaire,nom,titre 
FROM employe 
WHERE 1 = 1
  AND tauxcom<15

/*25 Afficher le nom, le salaire, le taux de commission, le titre des employés 
dont le taux de commission est supérieur à 15
*/
SELECT tauxcom,salaire,nom,titre 
FROM employe 
WHERE 1 = 1
  AND tauxcom<15


--ARITHMETIC EXPRESSIONS

/*26 Afficher le nom, le salaire, le taux de commission et la commission des 
employés dont le taux de commission n'est pas nul.(la commission 
est calculée en multipliant le salaire par le taux de commission)
*/
SELECT nom,salaire,tauxcom,salaire*tauxcom as commission 
FROM employe 
WHERE 1 = 1
  AND tauxcom IS NOT NULL 

/*27 Afficher le nom, le salaire, le taux de commission, la commission des employés 
dont le taux de commission n'est pas nul, 
classé par taux de commission croissant. 
*/
SELECT nom,salaire,tauxcom,salaire*tauxcom as commission 
FROM employe 
WHERE 1 = 1
  AND tauxcom IS NOT NULL 
ORDER BY tauxcom ASC


--CONCATENATION

/*28 Afficher le nom et le prénom (concaténés) des employés. 
Renommer les colonnes
*/
SELECT CONCAT (nom, ' ', prenom) AS 'employé' -- (' ') is used to create a space between values
FROM employe


--STRING

--29 Afficher les 5 premières lettres du nom des employés. 
SELECT SUBSTRING(nom, 1, 5) 
FROM employe

--30 Afficher le nom et le rang de la lettre«r» dans le nom des employés.
SELECT nom, LOCATE('r', nom) -- "r" represents what we are looking for
FROM employe

/*31 Afficher le nom, le nom en majuscule et le nom en minuscule de l'employé 
dont le nom est Vrante. 
*/
SELECT nom, UPPER(nom), LOWER(nom)
FROM employe
WHERE 1 = 1 
  AND nom ='vrante'

--32 Afficher le nom et le nombre de caractères du nom des employés.
SELECT nom, LENGTH(nom) 
FROM employe