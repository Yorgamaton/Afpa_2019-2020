/*EXERCICE 4: Calcul du nombre de jeunes, de moyens et de vieux

Enoncé:
Il s'agit de dénombrer les personnes d'âge strictement inférieur à 20 ans, 
les personnes d'âge strictement supérieur à 40 ans 
et celles dont l'âge est compris entre 20 ans et 40 ans (20 ans et 40 ans y compris).
Le programme doit demander les âges successifs.
Le comptage est arrêté dès la saisie d'un centenaire. Le centenaire est compté.
Donnez le programme Javascript correspondant qui affiche les résultats.
*/

var tab = []; // we create an array
var young = 0; // counter for "jeunes"
var young_old = 0; // counter for "moyens"
var old = 0; // counter for "vieux"
do {
    var age = parseInt(prompt("Saisissez l'âge de toutes les personnes :"));
    tab.push(age); //here we put values enter by user
    if (age < 20) {
        young++; //increase the counter young when the program find an age under 20
    } else if (age > 40) {
        old++; // increase the counter old when the program find an age over 40
    } else { //if ((age>=20)&&(age<=40))
        young_old++; //increase the counter young_old when the program fin an age between 20 and 40
    }
} while (age < 100); // condition to stop the loop when we get a centenarian
console.log(tab);
console.log("Il y a " + young + " jeune(s), "+ young_old + " jeune(s) mais pas encore vieux et " + old + " vieux,");
