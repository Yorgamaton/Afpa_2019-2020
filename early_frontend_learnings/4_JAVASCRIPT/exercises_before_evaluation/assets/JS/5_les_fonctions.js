// // Exercice test
function maFonction() {
    var plop1 = 123;
    return plop1;
}

function maFonction2() {
    plop2 = 456;
}
plop1 = maFonction();
console.log("fonction 1 /plop1 : " + plop1);

maFonction2();
console.log("mafonction2 > plop2 : " + plop2);


/* EXERCICE 1:
Enoncé:

Créer les 2 fonctions suivantes:
--> produit(x, y)qui retourne le produit des 2 variables x, ypassées en paramètre.
--> afficheImg(image)qui affiche l’image passée en paramètre.
*/


var nombre;
var multiple;
var image;

function cube_produit(nombre, multiple) { // function to calculate the cube of a number and a multiplication 
    // cube
    nombre = parseInt(prompt("Saisissez un nombre dont vous voulez le cube :"));
    var cube = nombre * nombre * nombre; // I could place this line directly in the "document.write"
    document.write("le cube de " + nombre + " est égal à " + cube); //document.write is used to display the result on the HTML page
    // multiple
    nombre = parseInt(prompt("Saisissez la valeur que vous souhaitez multiplier :"));
    multiple = parseInt(prompt("Saisissez un multiple :"));
    var produit = nombre * multiple;
    document.write("<br> Le produit de " + nombre + " x " + multiple + " est égal à " + produit);
    return produit, cube;
}
//           OR 

//function cube(nombre) {
    // nombre = parseInt(prompt("Saisissez un nombre dont vous voulez le cube :"));
//     var cube = nombre * nombre * nombre;
//     document.write("le cube de " + nombre + " est égal à " + cube)
//     return cube;
// }

// function produit(nombre, multiple) {
//     nombre = parseInt(prompt("Saisissez la valeur que vous souhaitez multiplier :"));
//     multiple = parseInt(prompt("Saisissez un multiple :"));
//     var produit = nombre * multiple;
//     document.write("<br> Le produit de " + nombre + " x " + multiple + " est égal à " + produit)
//     return produit;
// }

function afficheImg(image) {
    document.write("<br> <img src=\"assets/img/papillon.jpg\" alt=\"dessin de papillon bleu et orange\" title=\"papillon\">") 
    // document.write is used here to display the image in the HTML page, and using an html tag for this.
}
cube_produit();
//  OR
// cube();
// produit();
afficheImg();

/* EXERCICE 2: 
Enoncé : 
Ecrivez une fonction qui prend deux paramètres:
--> phrase de type string
--> lettre de type string
La fonction compte le nombre de fois ou lettre apparaît dans phrase.
*/


var phrase = prompt("Saisissez une phrase :").toLowerCase(); // a string is considered like a array
var lettre = prompt("Saisissez une lettre :").toLowerCase(); // ".toLowerCase()" i use to convert all uppercase letter in the string to lowercase
var count = 0;

function compteur(phrase, lettre) { //function wich will search each letter in the phrase
    for (i = 0; i < phrase.length; i++) {
        if (phrase[i] == lettre) { 
            /*when the letter in the string is the same than the letter that user have keyed, 
            so it's increase the counter*/
            count++;
        }
    }
    return count;
}
compteur(phrase, lettre);

alert("Il y a " + count + " " + lettre + " dans la phrase : " + phrase);

/* EXERCICE 3
Enoncé: 
A partir du menu affiché à l’écran
Vous exécuterez, par les 3 premières options, les exercices déjà réalisés, appelés sous forme de fonc-tion.
L’option 4 est une généralisation de la recherche du nombre de voyelles dans un mot: 
elle permet de rechercher la présence de n’importe quel caractère dans une chaîne.
La recherche de voyelles dans une chaîne constitue une surcharge de cette fonction, dans la mesure 
où les caractères à rechercher seront fournis sous forme de chaîne.
*/


function produit() { // function to make a multiplication
    var nombre;
    var multiple;
    nombre = parseInt(prompt("Saisissez un nombre :"));
    multiple = parseInt(prompt("Saisissez un multiple :"));
    produit = nombre * multiple;
    alert("Le produit de " + nombre + " x " + multiple + " est égal à " + produit);
    return produit;
}

function somme_et_moy() { // function to calculate the sum and the average
    var occurence = 0;
    var somme_entier = 0;
    do {
        var entier = parseInt(prompt(
            "Saisissez autant que nombres que vous voulez : \n Entrez '0' pour arrêter la saisie"));
        somme_entier = somme_entier + entier;
        occurence++; // increase the occurence to make the average at the end
    } while (entier != 0) // condition to stop the loop : the user have to key "0"
    alert("La somme des notes est de " + somme_entier + "\n La moyenne est de : " + (somme_entier / (occurence - 1)));

}

function nombre_voy() { // function to count the number of vowel in a word
    var voyelles = 0;
    var mot = prompt("Saisir un mot :");
    for (i = 0; i < mot.length; i++) { // condition wich will check every letter of the world until to arrive at the end of the word
        if (mot[i] == "a" || mot[i] == "e" || mot[i] == "i" || mot[i] == "o" || mot[i] == "u" || mot[i] == "y") { // condition to compare each letter to each vowel
            voyelles++; // make an incremantation to know how many vowel there are in the word
        }
    }
    alert("le nombre de voyelles dans : " + mot + " est de " + voyelles);
}

function nombre_carac() { //function to find the occurence of a letter in a sentence
    var phrase = prompt("Saisissez une phrase :");
    var lettre = prompt("Saisissez une lettre :");
    var count = 0;
    for (i = 0; i < phrase.length; i++) { //condition to check every letter of each word in a sentence
        if (phrase[i] == lettre) { //condition to compare the letter that user keyed to each letter in the sentence
            count++; // incremantation when the program find a match
        }
    }
    return count;
}

//the menu is a prompt with the 4 choices. The user will key a number which call a function.
var choix = prompt("1 - Multiples \n 2- Somme et moyenne \n 3- Recherche du nombre de voyelles \n 4- Recherche du nombre des caractères suivants \n Entrez votre option : (1, 2, 3 ou 4)");
switch (choix) {
    case "1":
        produit();
        break;
    case "2":
        somme_et_moy();
        break;
    case "3":
        nombre_voy();
        break;
    case "4":
        nombre_carac();
        break;
    default:
        alert("l'option choisit n'est pas bonne !")
}

/* EXERCICE 4
Enoncé: 
Concevez  la  fonction strtok qui  prend  3  paramètres str1, str2, n en  entrée  
et  renvoie  une chaîne de caractères: str1 est composée d’une liste de mots séparés 
par le caractère str2.
strtok sert à extraire le nième mot de str1.Exemple:
Pour str1 = «robert ;dupont ;amiens ;80000 », strtok (str1, « ; », 3) doit retourner« amiens »
*/

var str1 = "robert ;dupont ;amiens ;80000";
var str2 = ";"; // sign of the separation. I'll can use "," or "/" or "-" etc...
var n = 0;

function strtok(str1, str2, n) { //function to extract a word in a string
    var res = str1.split(str2); // split is use to choose the sign will separate each work in the string and create more string
    console.log(res[n]);
}
strtok(str1, str2, n);