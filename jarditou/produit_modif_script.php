<?php

function check_values($donnees){ // this function will check each values send by the form
    $donnees = trim($donnees); // Delete useless spaces
    $donnees = stripslashes($donnees); // Delete antslashes
    $donnees = htmlspecialchars($donnees); // Convert special characters into HTML entities
    return $donnees;
}

function verif_values(){ //this function will verify required values and syntax.
    
    $pro_id = check_values($_POST['pro_id']);
    $pro_cat = check_values($_POST['pro_cat']);
    $pro_ref = check_values($_POST['pro_ref']);
    $pro_libelle = check_values($_POST['pro_libelle']);
    $pro_description = check_values($_POST['pro_description']);
    $pro_prix = check_values($_POST['pro_prix']);
    $pro_stock = check_values($_POST['pro_stock']);
    $couleur = check_values($_POST['couleur']);
    $photo = check_values($_POST['photo']);
    $date_ajout = check_values($_POST['date_ajout']);
    $date_modif = check_values($_POST['date_modif']);
    $bloque = check_values($_POST['bloque']);
    
    $error_pro_id = $error_pro_cat = $error_pro_ref = $error_pro_libelle = $error_pro_description = $error_pro_prix = $error_pro_stock = $error_couleur = $error_photo = $error_date_ajout = $error_date_modif = $error_bloque = "";

    //REGEX LIST
    $num1 ="/^[0-9]{1,10}$/"; //For pro_id & pro_cat_id int(10)
    $num2 ="/^[0-9]{1,6}(.[0-9]{0,2})$/"; //For pro_prix decimal(6,2)
    $num3 ="/^[0-9]{1,11}$/"; //FOr pro_stock int(11)
    $num4 ="/^[0-9]{1}$/"; //For pro_bloque tinyint(1)
    $alpha1 ="/^[a-z0-9_\-]{1,10}$/i"; //For pro ref varchar(10)
    $alpha2 ="/^[a-z0-9_\-\s]{1,200}$/i"; //For pro_libelle varchar(200)
    $alpha3 ="/^[a-z0-9_\-\s,.()\']{1,1000}$/i"; //For pro_description varchar(1000)
    $alpha4 ="/^[a-z]{1,30}$/i"; //For pro_couleur varchar(30)
    $alpha5 ="/^[a-z]{1,4}$/"; //For pro_photo varchar(4)
    $alpha6 ="/^(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))$/"; //For pro-d-ajout &pro_d_modif date

    if(isset($_POST['submit']))
    {
        $tab_verif =[];
        // Vérification de la clé de la table produits
        if (empty($pro_id))
        {
            echo $error_pro_id = "Veuillez renseigner ce champs";
            array_push($tab_verif, $pro_id);
        }else if (!preg_match($num1, $pro_id)){
            echo $error_pro_id = "La clé doit se composer que de chiffres ";
            array_push($tab_verif, $pro_id);
        }else{
            echo $error_pro_id = "YES U DID IT !";
            echo "Clé de la table produits = $pro_id <br>";
        }
        
        // Vérification de la catégorie du produit
        if (empty($pro_cat))
        {
            echo $error_pro_cat = "Veuillez renseigner ce champs";
        }else if (!preg_match($num1, $pro_cat)){
            echo $error_pro_cat = "La catégorie doit se composer que de chiffres ";
        }else{
            echo $error_pro_cat = "YES U DID IT !";
            echo "Catégorie du produit = $pro_cat <br>";
        }

        // Vérification de la référence produit
        if (empty($pro_ref))
        {
            echo $error_pro_ref = "Veuillez renseigner ce champs";
        }else if (!preg_match($alpha1, $pro_ref)){
            echo $error_pro_ref = "La référence doit se composer uniquement de lettres, chiffres, tirets et underscores (_)";
        }else{
            echo $error_pro_ref = "YES U DID IT !";
            echo "Référence du produit = $pro_ref <br>";
        }

        // Vérification du nom du produit
        if (empty($pro_libelle))
        {
            echo $error_pro_libelle = "Veuillez renseigner ce champs";
        }else if (!preg_match($alpha2, $pro_libelle)){
            echo $error_pro_libelle = "Le libellé doit se composer uniquement de lettres ";
        }else{
            echo $error_pro_libelle = "YES U DID IT !";
            echo "Nom du produit = $pro_libelle <br>";
        }

        // Vérification de la description du produit 
        if (empty($pro_description))
        {
            echo $error_pro_description = "Veuillez renseigner ce champs";
        }else if (!preg_match($alpha3, $pro_description)){
            echo $error_pro_description = "Le message comporte des caratères non valides ";
        }else{
            echo $error_pro_description = "YES U DID IT !";
            echo "Description du produit = $pro_description <br>";
        }

        // Vérification du prix 
        if (empty($pro_prix))
        {
            echo $error_pro_prix = "Veuillez renseigner ce champs";
        }else if (!preg_match($num2, $pro_prix)){
            echo $error_pro_prix = "Le prix doit être composé uniquement de chiffre ";
        }else{
            echo $error_pro_prix = "YES U DID IT !";
            echo "Prix = $pro_prix <br>";
        }

        // Vérification du nombre d'unité en stock 
        if (empty($pro_stock))
        {
            echo $error_pro_stock = "Veuillez renseigner ce champs";
        }else if (!preg_match($num3, $pro_stock)){
            echo $error_pro_stock = "La catégorie doit se composer que de chiffres";
        }else{
            echo $error_pro_stock = "YES U DID IT !";
            echo "Nombre d'unités en stock = $pro_stock <br>";
        }

        // Vérification de la couleur 
        if (empty($couleur))
        {
            echo $error_couleur = "Veuillez renseigner ce champs";
        }else if (!preg_match($alpha4, $couleur)){
            echo $error_couleur = "La couleur doit se composer que de lettres";
        }else{
            echo $error_couleur = "YES U DID IT !";
            echo "Couleur = $couleur <br>";
        }

        // Vérification de la photo
        if (empty($photo))
        {
            echo $error_photo = "Veuillez renseigner ce champs";
        }else if (!preg_match($alpha5, $photo)){
            echo $error_photo = "Ne correspond pas à une extension valide ";
        }else{
            echo $error_photo = "YES U DID IT !";
            echo "Extension de la photo = $photo <br>";
        }
    }

    try
    {
        require "php/connexion_bdd.php";
        $db = connexionBase();
        $requete = $db->prepare("UPDATE produits SET `pro_id`='$pro_id', `pro_cat_id`='$pro_cat', `pro_ref`='$pro_ref', `pro_libelle`='$pro_libelle', 
            `pro_description`='$pro_description', `pro_prix`='$pro_prix', `pro_stock`='$pro_stock', `pro_couleur`='$couleur', `pro_photo`='$photo', 
            `pro_d_ajout`='$date_ajout', `pro_d_modif`='$date_modif', `pro_bloque`='$bloque'
            WHERE pro_id='$pro_id'");
        $requete->execute();
        header('Location:index.php');
    }
    catch(PDOException $e){
        echo 'Erreur : '.$e->getMessage();
    }
    include 'upload_image.php';
    verif_image();
}
verif_values();

?>


