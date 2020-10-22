//TODO: Finir la vérification du formulaire et utiliser la fonction check_values.

function check_values($donnees)
{ // this function will check each values send by the form
    $donnees = trim($donnees); // Delete useless spaces
    $donnees = stripslashes($donnees); // Delete antslashes
    $donnees = htmlspecialchars($donnees); // Convert special characters into HTML entities
    return $donnees;
}
//verify login's form
var formLog = document.getElementById("formLogin");

formLog.addEventListener("submit", function(e)
{
    var loginLog = document.getElementById("login");
    var password = document.getElementById("password");

    if (loginLog.value.trim() == "")
    {
        var errorLogin = document.getElementById("errorLogin");
        errorLogin.textContent = "Veuillez renseigner votre identifiant !";
        errorLogin.style.color = "Red";
        e.preventDefault();
    }
    if (password.value.trim() == "")
    {
        var errorPass = document.getElementById("errorPass");
        errorPass.textContent = "Veuillez renseigner votre mot de passe !";
        errorPass.style.color = "Red";
        e.preventDefault();
    }
});

//verify Register's form
var formReg = document.getElementById("formRegister");
formReg.addEventListener("submit", function(e)
{
    var logReg = document.getElementById("loginRegister");
    var password = document.getElementById("passwordRegister");
    var passConfirm = document.getElementById("passwordConfirm");

    if (logReg.value.trim() == "")
    {
        var errorLoginReg = document.getElementById("errorLoginReg");
        errorLoginReg.textContent = "Veuillez renseigner votre identifiant !";
        errorLoginReg.style.color = "Red";
        e.preventDefault();
    }
    if (password.value.trim() == "")
    {
        var errorPassReg = document.getElementById("errorPassReg");
        errorPassReg.textContent = "Veuillez renseigner votre mot de passe !";
        errorPassReg.style.color = "Red";
        e.preventDefault();
    }
    if (passConfirm.value.trim() == "")
    {
        var errorConfirm = document.getElementById("errorConfirm");
        errorConfirm.textContent = "Veuillez confirmer votre mot de passe !";
        errorConfirm.style.color = "Red";
        e.preventDefault();
    }
});