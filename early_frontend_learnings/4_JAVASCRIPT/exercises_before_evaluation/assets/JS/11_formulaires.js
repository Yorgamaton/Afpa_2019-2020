//test cours
function checkForm(f) 
{
    alert("Vous vous appelez : " + f.elements['nom'].value + " " + f.elements['prenom'].value);
    return false;
}

/* EXERCICE
Ennoncé:
Réaliser   un   formulaire   "Contact.html"   correspondant   au   modèle   ci-dessous,
 avec les contraintes suivantes :
-->Le formulaire sera envoyé grâce à la méthode "Post".
-->La "Société" doit comporter au moins 1 caractère.
-->La "Personneà contacter" doit comporter au moins 1 caractère.
-->Le "Code postal"doit comporter 5 caractères numériques.
-->La "Ville"doit comporterau moins 1 caractère.
-->Le Emaildoit comporter au moins le caractère "@".

Le  champ  "Environnement  technique"  est  une  liste  déroulante  dans laquelle  
on  peut  choisir  les  techniques  utilisées  pour  le  projet  proposé, 
ainsi qu'une zone de texte qui reçoit la sélection.
Il  est  permis  de  rajouter  des  informations  manuelles  dans  la  zone  de texte.
La valeur "Choisissez" ne doit pas s'afficher dans la zone de texte si elle a été sélectionnée.

Prévoyez les messages appropriés en cas d'erreur de saisie (deux alert):
--> entrez le nom de la personne à contacter s.v.p. !
--> entrez le code postaal sur 5 chiffres s.v.p. !
*/

