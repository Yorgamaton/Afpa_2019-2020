--BEFORE TO USE, import exemple_database.sql

SELECT*
FROM table1
JOIN table2 
  ON condition_de_jointure_table1_table2
WHERE condition_de_restriction

--JOIN

/*1 Rechercher le numéro du département, le nom du département, le nom des employés 
classés par numéro de département (renommer les tables utilisées).
*/SELECT dept.nodept, dept.nom AS nom_dept, employe.nom
FROM dept
JOIN employe ON dept.nodept = employe.nodept

--2 Rechercher le nom des employés du département Distribution.
SELECT dept.nodept, dept.nom AS nom_dept, employe.nom
FROM dept
JOIN employe ON dept.nodept = employe.nodept
WHERE 1 = 1
AND dept.nom ='distribution'


--AUTO-JOIN

/*3 Rechercher le nom et le salaire des employés qui gagnent plus que leur patron, 
et le nom et le salaire de leur patron.
*/ 
SELECT a.nom AS nom_employe, --a is for the first array to create
  a.salaire AS salaire_employe,
  a.noemp AS noemp_employe,
  a.nosup AS nosup_employe,
  b.nom AS nom_patron, --b is for the second array to create
  b.salaire AS salaire_patron,
  b.noemp AS noemp_patron,
  b.nosup AS nosup_patron
FROM employe AS  a -- for change the name of the firt array
JOIN employe AS  b -- for change the name of the second array
ON a.nosup = b.noemp -- to pick up the values to compare
WHERE a.salaire> b.salaire -- restriction condition where employee's salary is higher than boss's salary


--SUBQUERY
SELECT *
FROM emp
WHERE nodep IN
  (SELECT nodept FROM dept WHERE nom='...');

--4 Rechercher le nom et le titre des employés qui ont le même titre que Amartakaldire. 
SELECT nom, titre
From employe
where 1 = 1 
  AND titre = 'representant'

--or

SELECT nom, titre
FROM employe
WHERE 1 = 1
And titre = -- when there are several values us "IN" 
     (SELECT titre 
	  FROM employe 
	  WHERE nom = 'amartakaldire');

/*5 Rechercher le nom, le salaire et le numéro de département des employés 
qui gagnent plus qu'un seul employé du département 31, 
classés par numéro de département et salaire. 
*/
SELECT nom, salaire, nodept
FROM employe
WHERE 1 = 1
  AND salaire >
    (SELECT salaire
    FROM employe
    WHERE nodept = 31
    LIMIT 1 --Use limit to pick only one line of this condition
	 );
ORDER BY salaire DESC, nodept DESC 

/*6 Rechercher le nom, le salaire et le numéro de département des employés 
qui gagnent plus que tous les employés du département 31, 
classés par numéro de département et salaire.
*/
SELECT nom, salaire, nodept
FROM employe
WHERE 1 = 1
  AND salaire > ANY  
    (SELECT salaire
    FROM employe
    WHERE nodept = 31 
	 )
  AND nodept <> 31
ORDER BY salaire DESC, nodept DESC 


/*7 Rechercher le nom et le titre des employés du service 31
qui ont un titre que l'on trouve dans le département 32.
*/
SELECT nom, titre
FROM employe
WHERE 1 = 1
  AND nodept = 31 
  AND titre = ANY  
    (SELECT titre
    FROM employe
    WHERE nodept = 32
	 )

/*8 Rechercher le nom et le titre des employés du service 31
qui ont un titre l'on ne trouve pas dans le département 32. 
*/
SELECT nom, titre
FROM employe
WHERE 1 = 1
  AND nodept = 31 
  AND titre <> ANY  
    (SELECT titre
    FROM employe
    WHERE nodept = 32
	 )

/*9 Rechercher le nom, le titre et le salaire des employés 
qui ont le même titre et le même salaire que Fairant.
*/
SELECT nom, salaire, titre
FROM employe
WHERE 1 = 1 
  AND titre =    
    (SELECT  titre
    FROM employe
    WHERE nom = 'fairent'
	 )
  AND salaire = 
   (SELECT salaire
    FROM employe
	 WHERE nom = 'fairent'
    )


--EXTERNALS QUERIES

/*10 Rechercher le numéro de département, le nom du département, 
le nom des employés, en affichant aussi les départements dans lesquels
il n'y a personne, classés par numéro de département.
*/
SELECT dept.nodept, dept.nom AS nom_dept, employe.nom
FROM dept
LEFT JOIN employe ON dept.nodept = employe.nodept


/*GROUP FUNCTIONS EXEMPLES

AVG(moyenne), MIN(minimum), MAX(maximum), 
SUM(somme), COUNT(dénombrement)...
*/
SELECT AVG(salaire)
FROM emp
WHERE titre = 'Secrétaire'
;

/*recherchez le nom et la moyenne des salaires des employés 
NE FONCTIONNE PAS (produit un message d'erreur)
*/
SELECT nom, AVG(salaire) 
FROM emp 
; 

/*rechercher le nom et le salaire des employés 
dont le salaire est le plus grand.
*/
SELECT nom, salaire
FROM emp
WHERE salaire = 
  (SELECT MAX (salaire) 
  FROM emp) ;


--GROUPS (GROUP BY)

--11 Calculer le nombre d'employés de chaque titre
SELECT titre,COUNT(nom) AS 'nbr emp/titre'
from employe
GROUP BY titre

--12 Calculer la moyenne des salaireset leur somme, par région. 

SELECT dept.noregion, AVG(salaire) AS moy_salaire, SUM(salaire) AS sum_salaire
FROM dept
LEFT JOIN employe ON dept.nodept = employe.nodept
GROUP BY noregion


--HAVING CLAUSE

--13 Afficher les numéros des départementsayant au moins 3 employés
SELECT COUNT(nodept)
FROM employe
GROUP BY nodept
HAVING COUNT(nodept)>2;

--14 Afficher les lettres qui sont l'initialed'au moins trois employés.
SELECT
LEFT(nom, 1) AS first_letter,
COUNT(nom) AS total
FROM employe
GROUP BY first_letter
HAVING COUNT(nom)>2

/*15 Rechercher le salaire maximum et le salaire minimum 
parmi tous les salariés et l'écart entre les deux
*/
SELECT MAX(salaire), MIN(salaire), MAX(salaire) - MIN(salaire) AS diff_sal
FROM employe

--16 Rechercher le nombre de titres différents.
SELECT COUNT(DISTINCT titre) AS nbr_titre_diff --DISTINCT delete duplicates entiries
FROM employe

--17 Pour chaque titre, compter le nombre d'employés possédant ce titre.
SELECT titre, COUNT(nom) AS 'nombre employé'
FROM employe
GROUP BY titre

--18 Pour chaquenom dedépartement,afficher le nom du département et lenombre d'employés
SELECT dept.nom, COUNT(employe.nom)
FROM dept
JOIN employe ON dept.nodept = employe.nodept --put a "LEFT JOIN" to add departement where there are no employee
GROUP BY dept.nom

/*19 Rechercher les titres et la moyenne des salaires par titre 
dont la moyenne est supérieure à la moyenne des salaires des Représentants. 
*/
SELECT titre, AVG(salaire)
FROM employe
GROUP BY titre
HAVING AVG(salaire) > ANY
  (SELECT AVG(salaire)
  FROM employe
  WHERE titre ='représentant')

--20 Rechercher le nombre de salaires renseignés et le nombre de taux de commission renseignés.
SELECT COUNT(salaire), COUNT(tauxcom)
FROM employe

