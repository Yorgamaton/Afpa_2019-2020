/*EXERCICE 6 : recherche d'un prénom

Enoncé :
Un prénom est saisi au clavier. On le recherche dans le tableau tab donné ci-après.
Si le prénom est trouvé, on l'élimine du tableau en décalant les cases qui le suivent, 
et en mettant à blanc la dernière case.
*/

var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
var name = prompt("Saisissez une prénom : \nVeuillez respecter les majuscules et les accents !");
for (var i=0; i<tab.length; i++){
    if(tab[i]==name){ 
        tab.splice(i, 1); //Used to delete a string of an array, "i" is the position, "1" the quantity of element to delete 
        tab.push(" "); // to put and empty string at the end of the array
    }
}
console.log(tab);