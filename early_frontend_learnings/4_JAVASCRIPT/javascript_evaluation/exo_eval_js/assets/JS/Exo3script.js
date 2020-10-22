/*EXERCICE 3: Mini et maxi

Enoncé:
Modifiez le programme de la moyenne pour afficher le minimum et le maximum
*/

var occurence = 0; // to count all the numbers that user will enter
var somme_entier = 0;
// initialize the variable that will be used to get the total of all numbers which be keyed by user
var tab = []; //create a new tab
do {
    var entier = parseInt(prompt(
        "Saisissez autant que nombres que vous voulez : \n Entrez '0' pour arrêter la saisie"));
    tab.push(entier); //it will add all values in the array
    somme_entier = somme_entier + entier; // formula to sum all the numbers that user will key
    occurence++; //for count the total of the name that user will key
    if (entier == 0) {
        tab.pop(entier); //use to remove the "0" from the array (useful to don't get 0 in Math.min())
        console.log(tab);
    }
} while (entier != 0) //loop with the condition to stop the prompt
console.log("Le minimum est : " + Math.min(...tab) + "\nLe maximum est : " + Math.max(...tab));
// (...tab) is call the spread syntaxe (syntaxe de décomposition)
console.log("La somme est : " + somme_entier + "\nLa moyenne est de : " + (somme_entier / (occurence - 1)));
/* the last console.log is to show the sum and the average value with the formula. 
"-1" is for the the "0" wich add a quantity of the numbers that user have keyed*/