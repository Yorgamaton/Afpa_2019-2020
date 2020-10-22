/* EXERCICE
Enoncé:
Reprenez le formulaire créé à la séance précédente 
et appliquer au moins un contrôle de saisie à l’aide d’une expression régulière. 
*/
var verif = document.getElementById("button");
    verif.addEventListener("click", function()
    {
        var text =new RegExp(/^[A-Za-z]+$/); // will verify if there are at least one letter ("+") and only letter (lower (a-z) and upper (A-Z) case)
        var pseu = document.getElementById("pseudo").value;
        
        if (!text.test(pseu)){ //We can put the RegExp's test directly in the condition. Using "!" wich mean if RegExp is not respected.
            alert("INVALID : doit comporter uniquement des lettres !")
        }    
    });


