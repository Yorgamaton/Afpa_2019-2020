# Projet Fil Rouge : Village Green

Village green est un projet qui me permet de mettre en pratique l'ensemble des compétences acquises durant ma formation de **Développeur Web et Web Mobile**. 

## Cahier des charges 

### Objectifs

L'entreprise Village Green distribue du matériel musical. Elle a une activité de grossiste, c'est-à-dire de revente aux magasins spécialisés. Elle souhaiterait développer la vente aux particuliers. Dans cette optique, l'entreprise souhaite faire évoluer son système de gestion des commandes et de facturation.

Actuellement, l'organisation utilise un système qui ne donne pas entière satisfaction. L'informatisation de la totalité du processus depuis la publication du catalogue, de la commande jusqu'au paiement a pour objectif de fluidifier le workflow de l'entreprise.

La société souhaite avoir un site e-commerce permettant aux clients de visualiser l'ensemble du catalogue et de passer des commandes en ligne.

### L'existant

- Les produits référencés sont achetés directement auprès des fournisseurs (constructeurs ou importateurs).
- Dans le catalogue de l'entreprise tous les produits sont organisés en
- Chaque produit doit être décrit par un libellé court et un libellé long (description), une référence fournisseur, un prix d'achat et une photo.
- L'équipe qui gère les relations avec les fournisseurs tient à jour le catalogue. Elle met à jour le stock, valide ou pas la publication de nouveaux produits et désactive d'anciens produits. Elle gère aussi l'arborescence (rubriques/sous-rubriques).
- Tous les prix sont notés hors taxes.
- Le prix de vente est calculé à partir du prix d'achat auquel on applique un coefficient en fonction de la catégorie du client (particulier ou professionnel).
- Les coefficients sont attribués aux clients au moment de leur création et peuvent être ajustés par le service commercial.
- A chaque client est attribué un commercial. Un commercial spécifique s'occupe des clients particuliers
- Quand un client passe une commande, il peut être appliqué une réduction supplémentaire sur le total, cette réduction est négociée par le service commercial.
- Au moment de la commande, il faut prendre en compte l'adresse de livraison et l'adresse de facturation. Un bon de livraison et une facture doivent pouvoir être éditées.
- Pour les clients particuliers, un paiement à la commande est exigé.
- Pour les clients professionnels, le paiement se fait en différé.
- Dans les deux cas de figure, on notera l'information concernant le règlement.
- Chaque client se voit attribuer une référence qui servira à l'identifier lors des échanges avec les différents services de l'entreprise (après-vente, commercial, comptabilité)
- Une commande expédiée même partiellement fait l'objet d'une facturation de l'ensemble de la commande.
- Les commandes et les documents associés sont conservés pendant trois ans.

### Travail à réaliser

- [ ] **Un module de gestion des commandes. Réservé au service commercial, ce module doit permettre de :**

    - [ ] Créer une nouvelle commande
    - [ ] Ajouter des produits dans la commande
    - [ ] Connaître l'état de la commande (saisie, annulée, en préparation, expédiée, facturée, retard de paiement, soldée)
    - [ ] Consulter les clients en retard de paiement à une date donnée
    - [ ] Modifier ou annuler la commande avant qu’elle ne soit en préparation
    - [ ] Les commandes seront saisies par le biais d'une interface accessible par internet

- [ ] **Un module de gestion des produits :**

    - [ ] ajouter des produits et leurs caractéristiques (libellé, caractéristiques, prix etc.)
    - [ ] modifier des produits
    - [ ] supprimer des produits

- [x] **Utiliser un outil de gestion de version**

	En utilisant l'outil de gestion de versions GIT :

    - [x] Créez un dépôt pour suivre les modifications apportées à votre projet.
    - [x] Synchronisez votre dépôt local avec un dépôt distant GitHub.
    - [x] Votre dépôt doit être accessible publiquement et contenir un fichier README.md.


- [ ] **Mettre en place une base de données**

    - [ ] _Elaborer le dictionnaire de données_
        A partir du cahier des charges, élaborez le dictionnaire des données :
        - [ ] Les descriptions devront être claires et réalistes.
        - [ ] Les informations devront être typées.
		
    - [ ] _Créer la base de données_
        Analysez les _**documents annexes**_ (fichier annexes.zip à la racine) qui comportent des éléments à prendre en compte .

        - [ ] Réaliser le MCD du site e-commerce en tenant compte de toutes les contraintes fonctionnelles énoncées dans le cahier des charges (partie L'existant notamment).

        - [ ] Ecrivez le script de création de la base de données (vous pouvez utiliser le script de génération de la base précédemment obtenu).

        - [ ] Ce script doit prendre en compte l'ensemble des tables du schéma physique, les clés primaires et étrangères, les index et les droits d'accès.

        - [ ] Pour la sécurité, vous devez prévoir plusieurs profils de connexion et décliner les autorisations nécessaires.
            - [ ] Profil visiteur : lecture sur le catalogue
            - [ ] Profil client : lecture sur toute la base (insertion et mise à jour dans commande et client)
            - [ ] Profil gestion : lecture/écriture dans la base
            - [ ] Profil administrateur (ou développeur) : comme gestion + création et suppression d'objet
			
        - [ ] Alimenter la base de tests : créez un script d'insertion des données dans l'ensemble des tables de la base de données. Ces données seront compréhensibles par un utilisateur de base et devront donc avoir des valeurs en cohérence avec le domaine fonctionnel.

        Vous pouvez vous aider de ce [site](http://generatedata.com/) bien pratique.
        - [ ] Décrivez les procédures que vous mettez en place pour assurer les sauvegardes de la base.
        - [ ] Testez une restauration.


- [ ] **Manipuler la base de données**
    - [ ] _Formaliser des requêtes à l'aide du langage SQL_
        - [ ] Pour chacune des interrogations demandées (voir cahier des charges), créez un script contenant la ou les requêtes nécessaires.
        - [ ] Exportez les tables principales (entité) vers des tableaux d'un tableur de votre choix ainsi que le contenu du résultat de vos requêtes.

        Certaines interrogations sont à prévoir :
        - [ ] chiffre d'affaires hors taxes généré pour l'ensemble et par fournisseur
		- [ ] liste des produits commandés pour une année sélectionnée (référence et nom du produit, quantité commandée, fournisseur)
        - [ ] liste des commandes pour un client (date de commande, référence client, montant, état de la commande)
        - [ ] répartition du chiffre d'affaires hors taxes par type de client
        - [ ] lister les commandes en cours de livraison.
        Ces tableaux devront apparaître dans votre dossier final.

	- [ ] _Programmer des procédures stockées sur le SGBD_
		Créez une procédure stockée :
    	- [ ] qui renvoie le délai moyen entre la date de commande et la date de facturation

	- [ ] _Gérer les vues_
    	- [ ] Créez une vue correspondant à la jointure Produits - Fournisseurs

- [ ] **Construire la maquette de l'application**
    - [ ] Représentez le diagramme de cas d'utilisation d'une commande sur le site par un client particulier. La notion de panier doit y apparaître.
    - [ ] Avec un outil de maquettage (Draw.io, Balsamiq ou encore Pencil), réalisez la maquette de la page de connexion du site.

- [ ] **Développer une application web**
Réalisez un site e-commerce pour les clients particuliers qui permet de :

	- [ ] consulter le catalogue
	- [ ] saisir de nouvelles commandes
	- [ ] visualiser les anciennes commandes
		
    - [ ]  _Développer des pages web statiques (HTML/CSS)_
        - [ ] Réaliser une page d'accueil pour votre projet. Vous devez réaliser l'intégration HTML/CSS de votre page d'accueil à partir des éléments qui vous sont fournis dans la _**charte graphique**_ (fichier charte.zip à la racine).
		
		Le site sera divisé en deux parties :
        - [ ] Front-office : contient la partie publique du site (dont la page d'accueil) et un accès à la liste de produits et accès au formulaire d'inscription. Vous devez intégrer au mieux les éléments de la charte graphique.
        - [ ] Back-office : c'est la partie privée du site, réservée à l'administrateur, elle permet de gérer les produits et les commandes (si vous avez le temps...).
		
    - [ ] _Intégrer des scripts clients (Javascript)_
        - [ ] Votre application web doit comporter un formulaire d'inscription pour le client.
        - [ ] Vous devez empêcher l'utilisateur d'envoyer des informations erronées et lui indiquer les erreurs.
		
    - [ ] _Développer des composants web d'accès aux données_
         [ ] Vous devez mettre en œuvre la gestion CRUD sur une table de votre choix. Ces pages devront être accessibles à partir de votre menu d'accueil.

        - [ ] Votre interface doit permettre d'afficher la liste des éléments, l'ajout, la modification et la suppression.

        - [ ] Vous devez utiliser une architecture MVC pour réaliser ce travail.

- [ ] **Mettre en œuvre une solution de gestion de contenu ou d'ecommerce**

Dans le cadre de sa stratégie S.E.O., la société Village Green veut développer du [marketing de contenu](https://fr.wikipedia.org/wiki/Marketing_de_contenu) autour des produits qu'elle commercialise via un blog en Wordpress (articles sur les nouveaux produits, tests, vulgarisation technique, vie de l'entreprise etc.).

Utilisez l'extension [FakerPress](https://fr.wordpress.org/plugins/fakerpress/) pour créer de faux articles.

Le site doit s'inspirer de la page d'accueil de Village Green :

- [ ] Réalisez un thème responsive qui reprend les grandes lignes de la charte graphique du site e-commerce.
- [ ] Les employés pourront écrire des articles sans les publier. Il n'y aura qu'un seul administrateur, lequel se chargera, entre autres tâches, de valider les articles.
- [ ] Un plugin S.E.O. devra être configuré.
- [ ] La sécurité devra bien sûr être prise en compte.
- [ ] Publier le résultat de votre travail sur le serveur. Le site publié doit s'exécuter sans erreur.

- [ ] **Publier l'application**
    - [ ] Le projet Fil rouge (e-commerce et Wordpress) doit être hébergé sur votre compte dev.amorce.org.
    - [ ] L'exécution doit se dérouler sans erreurs.
