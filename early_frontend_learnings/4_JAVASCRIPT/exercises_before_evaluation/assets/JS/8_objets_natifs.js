// Exercice test affichage date

var myDate1 = new Date(); // Date du jour
var myDate2 = new Date(3600 * 24 * 365 * 40); // Date depuis le 1er janvier 1970
var myDate3 = new Date(2012, 9, 19);
var myDate4 = new Date(2012, 9, 19, 10, 33, 12);
var myDate5 = new Date("Jan 1, 2000 00:00:00");

console.log('new Date() : ' + myDate1.toLocaleString());
console.log('new Date(3600*24*365*40) : ' + myDate2.toLocaleString());
console.log('new Date(2012, 9, 19) : ' + myDate3.toLocaleString());
console.log('new Date(2012, 9, 19, 10, 33, 12) : ' + myDate4.toLocaleString());
console.log('new Date("Jan 1, 2000 00:00:00") : ' + myDate5.toLocaleString());
console.log("");
var annee = 1900 + myDate1.getYear();
var mois = myDate1.getMonth() + 1;
var jour = myDate1.getDate();
console.log('date du jour : ' + jour + "/" + mois + "/" + annee);

/* Exercice
Enoncé:
Ecrivez  un  programme  permettant  de  saisir  différentes  valeurs  numérique  
(avec  l'instruction win-dow.prompt), 
ces valeurs seront rangées dans un tableau. 
La saisie s'arrête quand l'utilisateur entre la valeur 0.
A  la fin  de  la  saisie,  votre  programme  doit  afficher  le  nombre  de  valeurs  saisies,  
la  somme  et  la moyenne.
*/

/* program what user can use to create an array 
it will display the number of value in it, the sum of these values and the average
*/
var tab = [];
var compteur = 0;
do {
    var saisie = parseInt(prompt("saisissez une valeur \n Entrez 0 (zéro) pour arrêter la saisie"));
    tab.push(saisie); // use push to put the values in the array
    compteur++; // the incremantation will be use to count the number of valeur 
    if (saisie == 0) // condition to stop the key
        tab.pop(); // use to delete the 0 in the array that the user will enter to stop the key
} while (saisie != 0)

var sum = tab.reduce(function (a, b) { // It will accumulate the first value to the second until there are only one value in the array
    return a + b; //this is the way that the reducer have to follow
});
console.log(tab);
console.log("Vous avez saisie " + (compteur - 1) + " valeurs."); // "compteur-1" because of the zero
console.log("La somme des valeurs saisies est égale à " + sum);
console.log("La moyenne des valeurs saisies est égale à " + sum / tab.length); // I'll can use the counter at the place of "tab.length"