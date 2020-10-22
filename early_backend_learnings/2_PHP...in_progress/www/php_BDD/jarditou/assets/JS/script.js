/*EXERCICE 7: vérification d'un formulaire

Enoncé:
Effectuez le contrôle de saisie de votre formulaire Jarditou en Javascript.
Lorsqu'une erreur est détectée, l'utilisateur doit en être informé grâce 
à l'affichage d'un message sous le champ concerné.
Le formulaire ne peut être envoyé que lorsque tout est bon.
*/
var contact = document.getElementById("contact");
var regExpAlpha = /^[a-zâäàéèùêëîïôöçñ-\s]+$/i; //nom, prenom => i is to use uppercase too
var regExpNum = /^[0-9]+$/;
var regExpEmail = /^[a-zA-Z0-9.!#$%&'*+\=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/i;

contact.addEventListener("submit", function (e) { // "e" is a conventionnal whey to call this fonction

    // All variables to get all inputs in the form
    var nom = document.getElementById("nom");
    var prenom = document.getElementById("prenom");
    var monsieur =document.getElementById("monsieur");
    var madame =document.getElementById("madame");
    var date = document.getElementById("date");
    var email = document.getElementById("email");
    var select = document.getElementById("select");
    var message = document.getElementById("message");
    var accepte = document.getElementById("accepte");

    // To verify if the field "nom" is empty or valid
    if (nom.value.trim() == "") { //trim removes the leading and trailing white space and line terminator characters from a string.
        var errorNom = document.getElementById("errorNom"); // to get the span tag in the form
        errorNom.textContent = "Ce champs est requis."; //Insert a message in the span tag when there are an error
        errorNom.style.color = "red"; //to change the error message's color
        e.preventDefault(); // is used to prevent the form's default behavior (the submitting)
    }else if (!regExpAlpha.test(nom.value)){ //To remove the message when you click on the submit button an other time (if there are no error)
        var errorNom = document.getElementById("errorNom");
        errorNom.textContent = 'Ce champs ne peut contenir que des lettres.'; 
        errorNom.style.color = "orange"; 
        e.preventDefault();
    }else{ 
        var errorNom = document.getElementById("errorNom");
        errorNom.textContent = "RAS."; 
        errorNom.style.color = "green"; //to change the error message's color
    }

    // To verify the field "prenom" is empty or valid
    if (prenom.value.trim() == "") {
        var errorPrenom = document.getElementById("errorPrenom");
        errorPrenom.textContent = "Ce champs est requis.";
        errorPrenom.style.color = "red";
        e.preventDefault(); 
    }else if (!regExpAlpha.test(prenom.value)){
        var errorPrenom = document.getElementById("errorPrenom");
        errorPrenom.textContent = "Ce champs ne peut contenir que des lettres.";
        errorPrenom.style.color = "orange";
        e.preventDefault();
    }else{
        var errorPrenom = document.getElementById("errorPrenom");
        errorPrenom.textContent = "RAS.";
        errorPrenom.style.color = "green";
    }

    // To verify the field "sexe" is checked or unchecked (one have to be checked)
    if ((monsieur.checked == false)&&(madame.checked == false)) { //when the radio is uncheck, it return false.
        var errorSexe = document.getElementById("errorSexe");
        errorSexe.textContent = "Ce champs est requis.";
        errorSexe.style.color = "red";
        e.preventDefault(); 
    }else{
        var errorSexe = document.getElementById("errorSexe");
        errorSexe.textContent = "RAS.";
        errorSexe.style.color = "green";

    }

    // To verify the field "date" is empty
    if (date.value.trim() == "") { 
        var errorDate = document.getElementById("errorDate");
        errorDate.textContent = "Ce champs est requis.";
        errorDate.style.color = "red";
        e.preventDefault(); 
    }else{
        var errorDate = document.getElementById("errorDate");
        errorDate.textContent = "RAS.";
        errorDate.style.color = "green";
    }

    // To verify the field "e-mail" is empty or valid
    if (email.value.trim() == "") { 
        var errorEmail = document.getElementById("errorEmail");
        errorEmail.textContent = "Ce champs est requis.";
        errorEmail.style.color = "red";
        e.preventDefault(); 
    }else if (!regExpEmail.test(email.value)){ //This condition is usefull if the input is a type="text".
        var errorEmail = document.getElementById("errorEmail");
        errorEmail.textContent = "L'adresse mail n'est pas valide.";
        errorEmail.style.color = "orange";
        e.preventDefault();
    }else{
        var errorEmail = document.getElementById("errorEmail");
        errorEmail.textContent = "RAS.";
        errorEmail.style.color = "green";
    }

    // To verify the field "sujet" is selected
    if (select.value.trim() == "Selectionnez votre sujet") { // "Slectionnez votre sujet" is the value by default
        var errorSelect = document.getElementById("errorSelect");
        errorSelect.textContent = "Ce champs est requis.";
        errorSelect.style.color = "red";
        e.preventDefault(); 
    }else{
        var errorSelect = document.getElementById("errorSelect");
        errorSelect.textContent = "RAS.";
        errorSelect.style.color = "green";
    }
    // To verify the field "votre message" is empty
    if (message.value.trim() == "") { 
        var errorMessage = document.getElementById("errorMessage");
        errorMessage.textContent = "Ce champs est requis.";
        errorMessage.style.color = "red";
        e.preventDefault(); 
    }else{
        var errorMessage = document.getElementById("errorMessage");
        errorMessage.textContent = "RAS.";
        errorMessage.style.color = "green";
    }
    // To verify the field "accepte" is checked or unchecked.
    if (accepte.checked == false) { 
        var errorAccepte = document.getElementById("errorAccepte");
        errorAccepte.textContent = "Ce champs est requis.";
        errorAccepte.style.color = "red";
        e.preventDefault();
    }else{
        var errorAccepte = document.getElementById("errorAccepte");
        errorAccepte.textContent = "RAS.";
        errorAccepte.style.color = "green";
    }
});
