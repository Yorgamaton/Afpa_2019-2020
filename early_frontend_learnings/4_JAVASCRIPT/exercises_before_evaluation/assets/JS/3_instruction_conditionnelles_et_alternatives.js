// TODO: finir de commenter
/* EXERCICE 0
Enoncé
Codez les exemples 1 à 6 présentés dans le paragraphe L'action conditionnée.
Transformer du speudo-code en code JS.

Exemple 1 :
Si Température > 38 alors 
Écrire "Le patient a de la fièvre"
Fin si  
*/

var temp = parseInt(prompt("Saisissez la température"));
if (temp > 38) {
    console.log("le patient a de la fièvre");
} else {
    console.log("le patient n'a pas de fièvre");
}

/* Exemple 2:
Si Température > 41 et Tension > 25 alors 
Écrire "Le patient va perdre patience"  
Fin si
*/
var temp = parseInt(prompt("Saisissez la température :"));
var tens = parseInt(prompt("Saisissez la tension :"));
if ((temp > 41) && (tens > 25)) { // "&&" (mean "and") : both conditions have to be confirm to get the result
    console.log("Le patient va perdre patience");
} else {
    console.log("Le patient sera patient");
}

/* Exemple 3:
Si non Patient alors
Écrire "Éconduire l'olibrius"  
Fin si
*/
var temp = parseInt(prompt("Saisissez la température :"));
var tens = parseInt(prompt("Saisissez la tension :"));
var patient = ((temp > 41) && (tens > 25))
if (!patient) {
    console.log("Econduire l'olibrius");
}

/* Exemple 4 :
Si Température > 40 ou Tension >= 25 alors 
Écrire "Hospitaliser le patient"  
Fin si    
*/
var temp = parseInt(prompt("Saisissez la température :"))
var tens = parseInt(prompt("Saisissez la tension :"));
if ((temp > 40) || (tens >= 25)) { // "||" (mean "or") : one of theres conditions have to be confirm to get the result
    console.log("Hospitaliser le patient");
} else {
    console.log("Ne pas hospitaliser le patient");
}

/*Exemple 5:
Si Température > 42 ou (Tension < 25 et Pouls > 180) alors  
Écrire "Prévenir la famille"  
Fin si
*/
var temp = parseInt(prompt("Saisissez la température :"));
var tens = parseInt(prompt("Saisissez la tension :"));
var pulse = parseInt(prompt("Saisissez le pouls :"));
if ((temp > 42) || ((tens < 25) && (pulse > 180))) { // "||" and "&&" can be used at the same time
    console.log("Prévenir la famille");
} else {
    console.log("Ne pas prévenir la famille");
}

/* Exemple 6 :
Si Patient ET Pouls = 0 alors
Écrire "Appeler le curé"
Fin si
*/
var tens = parseInt(prompt("saisissez la tension :"));
var pulse = parseInt(prompt("Saisissez le pouls :"));
var patient = (tens == 0);
if ((patient) && (pulse == 0)) {
    console.log("Appeler le curé");
}

/* EXERCICE 1
Enoncé :
Ecrivez un programme qui demande un nombre à l'utilisateur puis qui teste si ce nombre est pair. 
Le programme doit afficher le résultat nombre pair ou nombre impair. 
Vous devez utiliser l'opérateur modulo % qui donne le reste d'une division. 
a%2 donne le reste de la division de a par 2, si ce reste est égal à zéro, a est divisible par 2.
*/

// program to know if a number is even or uneven
var nbr = parseInt(prompt("saisissez une nombre :")); // user key a string which betransform in entire thanks to "parseInt"
var par = (nbr % 2); // %(modulo) 2 is used to divided a number by 2. Is the rest is equal to zero, the number is even. 
if (par == 0) { //condition if the number is even
    console.log("Le nombre est pair")
} else {
    console.log("Le nombre est impair")
}

/*EXERCICE 2
Enoncé:
Ecrivez un programme qui demande l'année de naissance à l'utilisateur. 
En réponse votre programme doit afficher l'âge de l'utilisateur 
et indiquer si l'utilisateur est majeur ou mineur.
*/

//program to know the age of someone, and know if he is of age
var dob = parseInt(prompt("Entrez votre année de naissance : (aaaa)")); //User key his birthday year
var year = parseInt(prompt("Saisissez l'année actuelle : ")) //user Key the actual year
var age = (year - dob);
console.log("Tu as " + age + " ans");
if (age < 18) { // condition to know if he is of age
    console.log(" et tu es mineur");
} else {
    console.log(" et tu es majeur");
}

/*EXERCICE 3
Enoncé
Faire la saisie de 2 nombres entiers, puis la saisie d'un opérateur +, -, * ou /. 
Si l'utilisateur entre un opérateur erroné, le programme affichera un message d'erreur. 
Dans le cas contraire, le programme effectuera l'opération demandée 
(en prévoyant le cas d'erreur division par 0), puis affichera le résultat.
*/

//program to make an operation
var nbr1 = parseInt(prompt("Saisissez un premier nombre entier :"));
var nbr2 = parseInt(prompt("Saisissez un second nombre entier :"));
var op = prompt("Saisissez un opérateur : (+, -, * ou /)");
var resultat;
if (op == "/" && nbr2 == 0) { //condition to say to user that a division by 0 is not possible
    alert("La division par zéro n'est pas possible !");
} else {
    switch (op) { // switch is used here to test a particular case according to the keyed of the user
        case "+":
            resultat = nbr1 + nbr2;
            break;
        case "-":
            resultat = nbr1 - nbr2;
            break;
        case "*":
            resultat = nbr1 * nbr2;
            break;
        case "/":
            resultat = nbr1 / nbr2;
            break;
            default: // It's used like an "else". Here it's to tell to use if he use a wrong operator
                alert("L'opérateur n'est pas valide. ")
                var op = prompt("Saisissez un opérateur : (+, -, * ou /)");
    }
    console.log("le résultat est " + nbr1 + op + nbr2 + "=" + resultat);
}

/*EXERCICE 4
Enoncé:
Un patron décide de calculer le montant de sa participation au prix du repas de ses employés de la façon suivante :
si il est célibataire : participation de 20%
si il est marié : participation de 25%
si il a des enfants : participation de 10% supplémentaires par enfant
la participation est plafonnée à 50%
si le salaire mensuel est inférieur à 1200 €, la participation est majorée de 10%.
Ecrire le programme qui lit les informations au clavier et affiche pour chaque salarié, la participation à laquelle il a droit.
*/

//program to know the amount of the participation to the meal by the boss according to his umployees' status
var mar = (confirm("Est-ce qu'il est marié ?") == true); //using a boolean to know is the umployee is maried or not
var nbe = parseInt(prompt("Saisissez un nombre d'enfant :"));
var salaire = parseInt(prompt("Saisissez le salaire :"));
var pc = 0;
if (salaire < 1200) { // condition if salary is inferior to 1200
    if (mar = true) { // if maried
        pc = 25 + (10 * nbe) + 10;
    } else { //if not maried
        pc = 20 + (10 * nbe) + 10;
    }
} else { // condition if salary is equal or superior to 1200
    if (mar = true) { //if maried
        pc = 25 + (10 * nbe);
    } else { //if not maried
        pc = 20 + (10 * nbe);
    }
}
if (pc > 50) { //condition if the participation is superior to 50% => It'll be reduce at 50%.
    pc = 50;
}
alert("La participation est de " + pc);