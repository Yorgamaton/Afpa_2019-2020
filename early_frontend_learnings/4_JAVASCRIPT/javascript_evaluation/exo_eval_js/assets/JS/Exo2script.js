/*EXERCICE 2: Somme des entiers inférieurs à N.

Enoncé: 
Ecrivez un programme qui affiche la somme des nombres inférieurs à N.
*/
var sum = 0; // initialize the variable that will be used to make the sum
var int = parseInt(prompt("Saisissez un nombre :")); // user will enter a number
for (var i = 0; i < int; i++) {
    var sum = sum + i; // the operation that will be repeat until the number "int" is reached
}
console.log("La somme des nombres inférieurs à " + int + " est " + sum +".");