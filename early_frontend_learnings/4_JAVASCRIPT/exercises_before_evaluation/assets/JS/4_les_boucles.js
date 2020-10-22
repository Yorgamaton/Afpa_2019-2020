        /*EXERCICE 1 : Saisie
        Enoncé : 
        Créer une page HTML qui demande à l'utilisateur un prénom.
        La page doit continuer à demander des prénoms à l'utilisateur jusqu'à ce qu'il laisse le champ vide.
        Enfin, la page affiche sur la console le nombre de prénoms et les prénoms saisis.
        */

        var nbrp = 0; //to count how many names the user will key
        var num = 1; //the first number which will appear in the prompt
        var name = prompt("Saisissez le prénom N°" + num + "\n Clic sur Annuler pour arrêter la saisie.");
        console.log(name);
        while (name != "") { //loop for enter names again and again
            num++; // to modify the number of the num in the prompt
            name = prompt("Saisissez le prénom N°" + num + "\n Clic sur Annuler pour arrêter la saisie.");
            console.log(name);
            nbrp++; // incrementation for the quantity of names keyed 
            if (name == "null") { // condition when the user click on "Cancel"
                console.log("vous avez entré " + nbrp + " prénom(s)."); //The number of the names which have been keyed
                break;
            }
        }

        // Autre solution
        var nbrp = 0; //to count how many names the user will key
        var num = 1; //the first number which will appear in the prompt
        do { //loop for enter names again and again
            var name = prompt("Saisissez le prénom N°" + num + "\n Clic sur Annuler pour arrêter la saisie.");
            console.log(name);
            num++; // to modify the number of the num in the prompt
            nbrp++; // incrementation for the quantity of names keyed 
            if (name == "null") { // condition when the user click on "Cancel"
                console.log("vous avez entré " + nbrp + " prénom(s).");
                //The number of the names which have been keyed
                break; // stop the loop
            }
        } while (name != "")

        /*EXERCICE 2 : Entiers inférieurs à N
        Enoncé:
        Ecrire un programme qui affiche les nombres inférieurs à N.
        */

        var nbr = parseInt(prompt("Saisissez un nombre :"));
        while (nbr > 0) { //loop to the number (nbr) until zero (0)
            console.log(nbr--) // To put the decrementing in the console
        }

        /*EXERCICE 3 : Somme d'un intervalle
        Enoncé :
        Ecrire un programme qui saisit deux nombres n1 et n2 
        et qui calcul ensuite la somme des entiers de n1 à n2.
        */

        var nbr1 = parseInt(prompt("Saisissez une premier nombre :"));
        var nbr2 = parseInt(prompt("saisissez un second nombre :"));
        var somme = 0; //to initialize the variable that will be used to sum numbers between nbr1 and nbr2
        while (nbr1 <= nbr2) { //loop that will end until that nbr1 is superior to nbr2
            somme = somme + nbr1; //formula to get all the numbers between nbr1 and nbr2 
            nbr1++; //incrementation to get all the numbers between nbr1 and nbr2 
        }
        console.log("La somme des entiers est de " + somme);

        /*EXERCICE 4 : Moyenne
        Enoncé :
        Ecrire un programme qui saisit des entiers 
        et en affiche la somme et la moyenne (on arrête la saisie avec la valeur 0).
        */


        var occurence = 0; // to count all the numbers that user will key
        var somme_entier = 0;
        // initialize the variable that will be used to get the total of all numbers which be keyed by user
        do {
            var entier = parseInt(prompt(
                "Saisissez autant que nombres que vous voulez : \n Entrez '0' pour arrêter la saisie"));
            somme_entier = somme_entier + entier; // formula to sum all the numbers that user will key
            occurence++; //for count the total of the name that user will key
        } while (entier != 0) //loop with the condition to stop the prompt
        console.log("la somme des notes est de " + somme_entier); //to show the total of all the numbers
        console.log("la moyenne est de : " + (somme_entier / (occurence - 1)));
        /*the last console.log is to show the average value with the formula. 
        "-1" is for the the "0" wich add a quantity of the numbers that user have keyed*/

        /*EXERCICE 5 : Multiples
        Enoncé :
        Ecrire un programme qui calcule les N premiers multiples d'un nombre entier X, 
        N et X étant entrés au clavier.
        Exemple pour N=5 et X=7 : 
        1 x 7 = 7
        2 x 7 = 14	
        3 x 7 = 21	
        4 x 7 = 28	
        5 x 7 = 35
        Il est demandé de choisir la structure répétitive (for, while, do...while) 
        la mieux appropriée au problème.
        */

        var nbr = parseInt(prompt("Saisissez un nombre :"));
        var multiple = parseInt(prompt("Saisissez un multiple"));
        for (i = 1; i <= nbr; i++) { //loop which multiply the "nbr" until "multiple" 
            console.log(i + "x" + multiple + "=" + (i * multiple)); //display the mutiplication 
        }

        //EXERCICE 6 : Nombre de voyelles
        /*Enoncé :
        Ecrire le programme qui compte le nombre de voyelles d’un mot saisi au clavier, en utilisant :
        myVar.length : retourne le nombre de lettres de la chaîne myVar.
        myVar.substr(p,n) : extrait d'une chaîne donnée une sous-chaîne de n caractères 
        à partir de la position p 
        (attention, en Javascript, le 1er caractère se trouve à la position 0)
        myVar.indexOf(chaine) : retourne le rang de la première occurrence de chaîne 
        dans la variable myVar donnée (si non trouvé : -1).
        */

        var voyelles = 0;
        var mot = prompt("Saisir un mot :");
        for (i = 0; i < mot.length; i++) { //loop to check all the character of the string, "mot.length" is used to know the number of character in the word
            if (mot[i] == "a" || mot[i] == "e" || mot[i] == "i" || mot[i] == "o" || mot[i] == "u" || mot[i] == "y") {
                //loop to compare each character by all vowels
                voyelles++; //to count the vowel
            }
        }

        alert("le nombre de voyelles dans :" + mot + " est de " + voyelles);
        //display the word which have been keyed and the quantity of vowel in this word


        //EXERCICE 7 : Un nombre est-il premier
        /* Enoncé :
        Ecrivez un programme qui permet de tester si un nombre est premier.
        */

        var nbr = parseInt(prompt("Saisissez un nombre"));
        var first = true;
        for (i = 2; i < nbr; i++) { //loop to know is not first
            if (nbr % i == 0) {
                first = false;
                console.log("ce nombre n'est pas premier"); // display if the number is not first
                break; //stop the loop
            }

        }
        if (first) { // if the number is not first, the number is true and first
            console.log(nbr + " est premier") // display if the number is first
        }

        //EXERCICE 8 : Nombre magique
        /* Ecrire un programme qui met en œuvre le jeu du nombre magique :
        L'ordinateur choisit un nombre aléatoire
        L'utilisateur doit trouver ce nombre.
        A chaque fois que l'utilisateur saisit une valeur, 
        il reçoit une indication lui indiquant plus petit ou plus grand.
        Vous aurez besoin de générer un nombre aléatoire avec la fonction random de l'objet Math : 
        var magic = parseInt(Math.random()*100); 
        */


         //loop to make guess a number to the user
          // "math.random" is used to pick a number between 0 and 1 (1 is excluded)
        var magic = parseInt(Math.random() * 100);
        console.log(magic);
        do {  var number = parseInt(prompt("Saisissez un nombre :"));
            if (number > magic) { // condition to say to user when the number he heyed is too big
                alert("Plus petit");
            } else if (number < magic) { // condition to say to user when the number he keyed is too small
                alert("Plus grand");
            }
        } while (number != magic) // condition to stop the loop
        alert("Bravo, vous avez trouvé !"); // information to say to user when he get the good number