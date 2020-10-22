// Exemple pour le clic sur une balise HTML
var element = document.getElementById("button1");

element.addEventListener("click", function () { //The click will execute the function
    alert("OK");
});

/*  OU
will return the first element of the document in the selector ('#lien') or a group of selector
If there are no correspondence, return "null".
*/
document.querySelector('#lien').onclick = function () 
{
    alert('Vous avez cliqué !');
}

/* EXERCICE 1 : Afficher un message alerte au clic
Le clic sur le bouton "Contrôler" engendre l’appel à la fenêtre d’information.
*/


var appel = document.getElementById("button");
appel.addEventListener("click", function () {
    var saisie = document.getElementById("name").value;
    alert("vous avez saisie : " + saisie);
});

/*EXERCICE 2 : nombre magique (The Magic Number)
Enoncé :
Reprenez l'exercice du nombre magique.
Votre programme doit générer un nombre aléatoire à l'aide de la fonction Math.random.
Ecrivez  la  fonction verif qui  doit  vérifier  si  la  saisie  de  l'utilisateur 
(dans textBox1)  correspond  au nombre magique, elle affiche des informations 
(trop grand, trop petit dans le label1.
Quand votre programme fonctionne, modifiez-le pour rendre le javascript non intrusif.
*/


var magic = parseInt(Math.random() * 100); // "math.random" is used to pick a number between 0 and 1 (1 is excluded) and parseInt to get an entire number
console.log(magic);

function verif() {
    let appel = document.getElementById("button1"); //"let" is a "var" which be used only in this function
    appel.addEventListener("click", function () { 
        var saisie = document.getElementById("textBox1").value; // ".value" is used to get the value whick useer have keyed
        console.log(saisie);
        //Here we will compare magic number to the keyed value a display a message in turn
        if (saisie > magic) { 
            document.getElementById("label1").innerHTML = 'Entrez une valeur plus petite'; //to replace (innerHTML) the label if thenumber is too low
        } else if (saisie < magic) {
            document.getElementById("label1").innerHTML = 'Entrez une valeur plus grande'; //to replace the label if the number is too high
        } else {
            alert("Bravo, vous avez trouvé !"); // information to say to user when he get the good number
        }
    });
}
verif();