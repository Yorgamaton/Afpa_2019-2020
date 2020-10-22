// // TODO:ajouter des commentaires

// /* Exercice 1 : programme création tableau + valeur ajouté par l'utilisateur
// Enoncé:
// Ecrivez un programme permettant de créer un tableau, dont la taille est saisie au clavier.
// Ensuite l'utilisateur doit rentrer les différentes valeurs du tableau.
// Puis votre programme doit afficher le contenu du tableau.
// */

// // Program to create a table in which you can choose the length and key the value that you want
var length = parseInt(prompt("Saisissez la quantité de valeur que vous souhaitez dans votre talbeau :"));
var tab = new Array(length);
for (var i = 0; i < length; i++) {
    var valeur = prompt("Saisissez une valeur :");
    tab[i] = valeur;
}
console.log(tab);

// /* Exercice 2 : suite de programme
// Enoncé: 
// Créer le programme qui fournira un menu permettant d’obtenir les fonctionnalités suivantes 
// à partir d’un tableau à une dimension:
//     --> Affichage du contenu de tous les postes du tableau,
//     --> Affichage du contenu d’un poste dont l’index est saisi au clavier,
//     --> Affichage du maximum et de la moyenne des postes du tableau
// Ce programme sera structuré de la manière suivante:
//     --> une fonction GetIntegerpour lire un entier au clavier, 
//     --> une fonctionInitTabpour créer et initialiser l’instance de tableau: le nombre de postes sou-haité sera entré au clavier,
//     --> une fonctionSaisieTabpour permettre la saisie des différents postes du tableau,
//     --> une fonction AfficheTabpour afficher tous les postes du tableau,
//     --> une fonctionRechercheTabpour afficher le contenu d’un poste de tableau dont le rang est saisi au clavier
//     --> une fonction InfoTab qui afficherale maximum et la moyenne des postes.
// Les fonctions seront appelées successivement.
// */
var entier;
var tab;
var length;
var saisie;
function getInteger() 
    {
        entier=parseInt(prompt("Saisissez un entier"));
        console.log(entier);
    }

function initTab() 
    {
        length = parseInt(prompt("Saisissez la quantité de valeur que vous souhaitez dans votre talbeau :"));
        tab = new Array(length);
    }

function saisieTab()
    {
        for (var i = 0; i < length; i++) {
            saisie = parseInt(prompt("Saisissez le ou les valeur(s) :"));
            tab[i] = saisie;
        }
    }

function afficheTab()
    {
        console.log(tab);
    }

function rechercheTab()
    {
        var tabval=parseInt(prompt("Saisissez la valeur du tableau que vous souhaitez afficher :"));
        console.log(tab[tabval]);
    }

function infoTab()
    {
        console.log(Math.max(saisie));
        var sum = tab.reduce(function (a, b){
             return a + b;
        });
        console.log(sum/length)
    } 
// getInteger();
initTab();
saisieTab();
afficheTab();
rechercheTab();
infoTab();

// /* EXERCICE 3: tri d'un tableau
// Enoncé:
// Ecrire le programme qui réalise le tri à bulles.
// */

// /*One way to use bubble sort
// BUT, this loop may run on an already sorted array more than once
// */
var tab = [3, 2, 1, 4, 5, 6, 7, 8, 9];

function triBul ()
    {
        for (var i=0; i<tab.length-1; i++)
        {
            for (j=0; j<tab.length-1; j++){
                var temp;
                if (tab[j]>tab[j+1])
                {
                    temp=tab[j];
                    tab[j]=tab[j+1];
                    tab[j+1]=temp;
                    console.log(tab);
                }  
            }   
        }
        return tab;
    }
    
triBul();

// // An other way to use bubble sort

var tab = [5, 18, 16, 4, 26];
function bubbleSort()
{
    do  
        {
            trier =false; // using boolean 
            for(var i=0; i<tab.length; i++)
            {
                if(tab[i]>tab[i+1]) // condition to test each peer of values
                {
                    // exemple for this array [15, 4]
                    var temp=tab[i]; //The value is shifted in a buffering variable (15 is set aside)
                    tab[i]=tab[i+1]; // The second value will be transfered here with the first value (15 become 4 = [4, 4])
                    tab[i+1]=temp; // the first value will take the place of the second value (se second for become 15 = [4, 15])
                    trier=true; //when the boolean return false, the loop is over and the table is ordered
                console.log(tab);
                console.log(trier);
                }
            }
        } while (trier); //loop while the array is not ordered (the default value of a boolean is "false" )
        return tab;
}
bubbleSort();

// /*EXERCICE 4 :Le tri par insertion
// Enoncé:
// Voici l’algorithme du tri par insertion, traduisez-le en langage Javascript:
// array est un tableau <-[666, 1, 7, 69, 33, 13]
// j <-1
// n <-longueur de array
// TantQue j <> n
//     i <-j -1
//     tmp = array[j]
//     TantQue i > -1 et array[i] > tmp
//         array[i+1] <-array[i]
//         i <-i –1
//     FinTantQue 
//     array[i+1] <-tmp
//     j <-j + 1
// FinTantQue
// */
