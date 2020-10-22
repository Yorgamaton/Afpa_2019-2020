$(document).ready(function() // initialise l'utilisation de JQuery au chargement de la page. Un seul $(document).ready nécessaire par script Jquery.
{
    // Pour afficher un alert lors du click sur un bouton
    $("#bouton").click(function() 
    // $("#bouton") : le sélecteur, qui cible l’élément passé en argument (ici l'input de type button dont l'attribut id est nommée bouton) 
    // .click : l'évènement, sur lequel on déclenchera le code contenu dans la fonction (ici affichage d'une boîte d'alerte). Le code Javascript de la fonction est celui que vous allez écrire : il va contenir à la fois du Javascript « normal » et du code spécifique à JQuery (fonctions etc.). 
    {
        alert("Pierre qui roule n'amasse pas mousse !");
    });

    // Pour changer la couleur du text sur le click de la souris
    $(".noir").click(function()         
    {
        // Changement de la couleur du texte au passage de la souris
        // Cette ligne de code sera expliquée plus loin dans ce cours 
        $(this).css("color", "black");  

        // fonction pour afficher un alert après un temps donné
        function magic(){
            alert("C'est de la magie !");
        } 
        // On demande d'exécuer la fonction après un certain temps en milliseconde
        setTimeout(magic, 500)
    });
    
    // To add shadow to all boxes and the header
    $("[class^='box'], .wrapperHeader").css("box-shadow", "0px 0px 7px 0px black");
});
