/*EXERCICE
Enoncé:
Soit les variables suivantes :
    a qui contient la chaîne de caractères 100
    b = 100
    c qui contient la valeur 1,00
    d booléen qui vaut vrai
A réaliser :
    Affichez Ceci est une chaîne de caractères : 100; concaténez cette chaîne avec la variable a pour afficher le 100.
    Appliquez à b l'opérateur de décrémentation
    Ajoutez à c la valeur de a
    Inversez la valeur de d
*/

var a = "100";
var b = 100;
var c = 1.00;
var nb = parseInt("100"); // transform the string into an entire
var d = true;
console.log("Ceci est une chaîne de caractères: " + a);
console.log(" Ceci est une décrémentation: " + --b); //Put "--" before the variable to get the decrementation
console.log(" Ceci est une addition: " + (c + nb))
console.log(!d); // add "!" in front of the variable to get the contrary of true. Ask not d, so I'll get false.