/*EXERCICE
Enoncé :
Créer un script qui demande successivement à l'utilisateur son nom puis son prénom.
La page demande ensuite à l'utilisateur s'il est un homme ou une femme.
Enfin, la page affiche les informations sur l'utilisateur.
*/

var sexe;
var nom = window.prompt("Saississez votre nom:"); // ask to user to key his last name
var prenom = window.prompt("saisissez votre Prénom:"); // ask to user to key is first name
if (window.confirm("Est-vous un Homme?") == true) { // using a boolean to know if the user is a Man or a Woman
    sexe = "Monsieur" // It will write "Mister"
} else {
    sexe = "Madame" //It'll write "Miss"
}
alert(`Bonjour ${sexe} ${nom} ${prenom}\n\nBienvenu sur notre site web!`); //display a personnalized message 
//alert("Bonjour "+sexe+" "+nom+" "+prenom\n\n "Bienvenue sur notre site web!") //it's an other way to write the alert