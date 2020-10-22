<?php
function check_values($donnees)
{ // this function will check each values send by the form
    $donnees = trim($donnees); // Delete useless spaces
    $donnees = stripslashes($donnees); // Delete antslashes
    $donnees = htmlspecialchars($donnees); // Convert special characters into HTML entities
    return $donnees;
}

$nom = check_values($_POST['nom']);
$prenom = check_values($_POST['prenom']);
$sexe = check_values($_POST['sexe']);
$date = check_values($_POST['date']);
$adresse = check_values($_POST['adresse']);
$cp = check_values($_POST['cp']);
$ville = check_values($_POST['ville']);
$email = check_values($_POST['email']);
$select = check_values($_POST['select']);
$message = check_values($_POST['message']);
$accepte = check_values($_POST['accepte']);

$errorNom = $errorPrenom = $errorSexe = $errorDate = "";
$errorEmail = $errorSelect = $errorMessage = $errorAccepte = "";

// $errorAdresse = "";
// $errorCp = "";
// $errorVille = "";

if (isset($_POST['submit'])){
    // Test for nom
    if (empty($nom))
    {
        $errorNom = "veuillez renseigner ce champs";
    }else if (!preg_match("/^[a-zâäàéèùêëîïôöçñ\-\s]+$/i", $nom)) {
        $errorNom = "Veuillez utiliser uniquement des lettres et tiret.";

    }else{
        $errorNom = "Tout est ok !";
        echo "Nom = $nom <br>";
    }
    //Test for prenom
    if (empty($prenom))
    {
        $errorPrenom = "veuillez renseigner ce champs";
    }else if (!preg_match("/^[a-zâäàéèùêëîïôöçñ\-\s]+$/i", $prenom)) {
        $errorPrenom = "Veuillez utiliser uniquement des lettres et tiret.";
    }else{
        $errorPrenom= "Tout est ok !";
        echo "Prénom = $prenom <br>";
    }

    //test for sexe
    if (empty($sexe))
    {
        $errorsexe = "veuillez cochez une des deux cases.";
    }else{
        $errorsexe = "Tout est ok !";
        echo "sexe = $sexe <br>";
    }

    echo "Date de naissance = $date <br>";
    echo "Adresse = $adresse <br>";
    echo "Code postal = $cp <br>";
    echo "Ville = $ville <br>";
    
    //test for E-mail
    if (empty($email))
    {
        $errorEmail = "Veuillez renseigner ce champs";
    }else if (!preg_match("/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/", $email)) {
        $errorEmail = "Veuillez entrez un E-mail valide.";
    }else{
        $errorEmail= "Tout est ok !";
        echo "E-mail = $email <br>";
    }

    //test for Select
    if ($select === "Selectionnez votre sujet")
    {
        $errorSelect = "Veuillez renseigner ce champs";
    }else{
        $errorSelect= "Tout est ok !";
        echo "Sujet = $select <br>";
    }

    // test for message
    
    if (empty($message))
    {
        $errorMessage = "Veuillez écrire un message.";
    }else{
        $errorMessage= "Tout est ok !";
        echo "Message = $message <br>";
    }
    
    // //test for accepte
    
    if (empty($accepte))
    {
        $erroraccepte = "Vous devez accepter les conditions avant de valider le formualire.";
    }else{
        $erroraccepte= "Tout est ok !";
        echo "Validation = $accepte";
    }
}



    // header("location: +lien"); TODO: Regarder comment ça fonctionne