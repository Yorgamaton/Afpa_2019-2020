{/* <form action="#" method="post">
    <input type="text" name="prenom" id="prenom">
    <input type="button" name="btn_envoyer" id="btn_envoyer" value="Envoyer">
</form> */}

function verif()
{
    // REGEX
    var regExpAlpha = /^[a-zâäàéèùêëîïôöçñ-\s]+$/i; //nom, prenom => i is to use uppercase too
    var regExpNum = /^[0-9]+$/;
    var regExpEmail = /^[a-zA-Z0-9.!#$%&'*+\=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/i;
    
    // Vérification du nom

    // On récupère la valeur dans l'input
    var nom = $('#nom').val();
    
    if (nom === "") 
    {
        $('#errorNom').html("Veuillez renseigner ce champs !");
        $('#errorNom').css({
            "color" : "red",
            "font-weight" : "bold",
            });
        // return false; // le script s'arrête ici, ce qu'il y a après n'est pas exécuté
    } 
    else if (!regExpAlpha.test(nom)) 
    {
        $('#errorNom').html("Ce champs ne peut contenir que des lettres !");
        $('#errorNom').css({
            "color" : "orange",
            "font-weight" : "bold",
            });
    } 
    else
    {
        $('#errorNom').html("Pas mal !");
        $('#errorNom').css({
            "color" : "green",
            "font-weight" : "bold",
            });
    }

    // Verification du prenom

    // On récupère la valeur dans l'input
    var prenom = $('#prenom').val();

    if (prenom === "") 
    {
        $('#errorPrenom').html("Veuillez renseigner ce champs !");
        $('#errorPrenom').css({
            "color" : "red",
            "font-weight" : "bold",
            });
    } 
    else if (!regExpAlpha.test(prenom)) 
    {
        $('#errorPrenom').after("Ce champs ne peut contenir que des lettres !");
        $('#errorPrenom').css({
            "color" : "orange",
            "font-weight" : "bold",
            });
    } 
    else
    {
        $('#errorPrenom').html("Pas mal !");
        $('#errorPrenom').css({
            "color" : "green",
            "font-weight" : "bold",
            });

    }
    // TODO: faire l'input radio
        var madame = $('#madame').val();
        var monsieur = $('#monsieur').val();

    // Vérification de la date
        var date = $('#date').val();
    if (date === "")
    {
        $("#date").after('<div class="alert alert-danger" role="alert">Veuillez renseigner ce champs !</div>');
    }

        var adresse = $('#adresse').val();
        var cp = $('#cp').val();
        var ville = $('#ville').val();
        var email = $('#email').val();
        var select = $('#select').val();
        var message = $('#message').val();
        var accepte = $('#accepte').val();
}

$("#submit").click(function(event) 
{
    // On vient arrêter le comportement par défaut      
    event.preventDefault();

    // Appel de la fonction verif()
    verif();        
}); 