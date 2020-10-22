--Import this database first : northwind_MySQL.sql 

--1 Liste des contacts français

SELECT CompanyName,ContactName,ContactTitle,Phone
FROM customers
WHERE country = 'France'

--2 Produits vendus par le fournisseur «Exotic Liquids»

SELECT products.ProductName AS produit, products.UnitPrice AS prix
FROM products
JOIN suppliers ON suppliers.SupplierID = products.SupplierID
WHERE suppliers.CompanyName = 'Exotic Liquids'

--3 Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant

SELECT suppliers.CompanyName AS fournisseur, COUNT(ProductName) AS nbre_produits
FROM suppliers
JOIN products ON products.SupplierID = suppliers.SupplierID
WHERE country = 'France'
GROUP BY suppliers.supplierID
ORDER BY nbre_produits DESC

--4 Liste des clients Français ayant plus de 10 commandes

SELECT customers.CompanyName AS 'client', COUNT(orders.CustomerID) AS nbre_commandes
FROM customers
JOIN orders ON orders.CustomerID = customers.CustomerID
WHERE country = 'France'
GROUP BY customers.CompanyName
HAVING nbre_commandes >10

--5 Liste des clients ayant un chiffre d’affaires > 30.000, classer par CA décroissant

SELECT customers.CompanyName AS 'client', SUM(`order details`.UnitPrice*`order details`.Quantity) AS CA, customers.Country AS pays
FROM customers
JOIN orders ON orders.CustomerID = customers.CustomerID
JOIN `order details` ON `order details`.OrderID = orders.OrderID
GROUP BY customers.CustomerID
HAVING CA >30000
ORDER BY CA DESC

--6 Liste des pays dont les clients ont passé commande de produits fournis par «Exotic Liquids»

SELECT customers.Country
FROM customers
JOIN orders ON orders.CustomerID = customers.CustomerID
JOIN `order details` ON `order details`.OrderID = orders.OrderID
JOIN products ON products.ProductID =`order details`.ProductID
JOIN suppliers ON suppliers.SupplierID = products.SupplierID
WHERE suppliers.CompanyName = 'Exotic Liquids'
GROUP BY customers.Country


--7 Montant des ventes de 1997

SELECT SUM(`order details`.UnitPrice*`order details`.Quantity) AS 'Montant Ventes 97'
FROM `order details`
JOIN orders ON orders.OrderID = `order details`.OrderID
WHERE YEAR(orders.OrderDate) = 1997

--8 Montant des ventes de 1997 mois par mois

SELECT MONTH(orders.OrderDate) AS 'mois 97', SUM(`order details`.UnitPrice*`order details`.Quantity) AS 'Montant Ventes 97'
FROM `order details`
JOIN orders ON orders.OrderID = `order details`.OrderID
WHERE YEAR(orders.OrderDate) = 1997
GROUP BY MONTH(orders.OrderDate)

--9 Depuis quelle date le client «Du monde entier» n’a plus commandé

SELECT MAX(orders.OrderDate) AS 'Date de dernière commande'
FROM orders
JOIN customers ON customers.CustomerID = orders.CustomerID
WHERE customers.CompanyName = 'Du monde entier'

--10 Quel est le délai moyen de livraison en jours?

SELECT ROUND(AVG(DATEDIFF(orders.ShippedDate,orders.OrderDate))) AS 'Délai moyen de livraison en jours'
FROM orders
