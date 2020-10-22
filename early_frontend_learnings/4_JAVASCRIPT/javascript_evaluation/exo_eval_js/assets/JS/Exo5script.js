/*EXERCICE 5: Table de multiplication

Enoncé:
Ecrivez une fonction qui affiche une table de multiplication.
Votre fonction doit prendre un paramètre qui permet d'indiquer quelle table afficher.
Par exemple, TableMultiplication(7) doit afficher :
1 x 7 = 7
2 x 7 = 14
3 x 7 = 21 ...
*/
function tableMultiplication(multiple){
    for (i = 1; i <11; i++) { //loop which multiply the "nbr" until "multiple" 
        console.log(i + "x" + multiple + "=" + (i * multiple)); //display the mutiplication 
    }
}
tableMultiplication(8); //choose the multiple you want
