<?php
session_start();
include 'util.php';

function check_values($donnees)
{ // this function will check each values send by the form
    $donnees = trim($donnees); // Delete useless spaces
    $donnees = stripslashes($donnees); // Delete antslashes
    $donnees = htmlspecialchars($donnees); // Convert special characters into HTML entities
    return $donnees;
}

function verif_login()
{
    $login =check_values($_POST['login']);
    $password = check_values($_POST['password']);
    if (isset($login) && !empty($login) &&
        isset($password) && !empty($password))
    {

        $db = connexionBase();
        $sql = $db->prepare("SELECT * FROM `users` WHERE `use_mail`=:use_mail");
        $sql->bindValue(':use_mail', $login);
        $sql->execute();        
        $row = $sql->fetch(PDO::FETCH_OBJ);
        if ($row) 
        {
            if(password_verify($password, $row->use_password))
            {
                $_SESSION['username'] = $row->use_firstname;
                $_SESSION['rank'] = $row->use_rank;
                header('Location:../index.php');
            }
            else
            {
                echo "identifiant ou mot de passe incorrect !";
            }
        }
        else
        {
            echo "identifiant ou mot de passe incorrect !";
        }
    } 
    else{
        header('Location:index.php');
    }


}

// TODO: Vérifier que l'identifiant n'existe pas déjà?
function verif_register()
{
    $lastname = check_values($_POST['name']);
    $firstname = check_values($_POST['firstname']);
    $email = check_values($_POST['loginRegister']);
    $password = check_values($_POST['passwordRegister']);
    $password2 = check_values($_POST['passwordConfirm']);
    $dateRegister = check_values($_POST['use_d_register']);

    $errorName = $errorFirstname = $errorMail = $errorPassword = $errorPassword2 = "";

    $regexNameFirstname = "/^[a-zâäàéèùêëîïôöçñ\-\s]+$/i";
    $regexMail = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
    $regexPass = "/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";


    $array_verif = [];

    //verify lastname
    if (empty($lastname)) {
        echo $errorName = "Veuillez renseigner votre nom";
        array_push($array_verif, $errorName);
    } else if (!preg_match($regexNameFirstname, $lastname)) {
        echo $errorName = "Veuillez renseigner un nom valide !";
        array_push($array_verif, $errorName);
    } else {
        echo "Ok !";
    }

    //verify firstname
    if (empty($firstname)) {
        echo $errorFirstname = "Veuillez renseigner votre prénom";
        array_push($array_verif, $errorFirstname);
    } else if (!preg_match($regexNameFirstname, $firstname)) {
        echo $errorFirstname = "Veuillez renseigner un prénom valide !";
        array_push($array_verif, $errorFirstname);
    } else {
        echo "Ok !";
    }


    //verify email
    if (empty($email)) {
        echo $errorMail = "Veuillez renseigner un e-mail";
        array_push($array_verif, $errorMail);
    } else if (!preg_match($regexMail, $email)) {
        echo $errorMail = "Veuillez renseigner un e-mail valide !";
        array_push($array_verif, $errorMail);
    } else {
        echo "Ok !";
    }
    // Verify first e-mail
    if (empty($password)) {
        echo $errorPassword = "Veuillez renseigner un mot de passe";
        array_push($array_verif, $errorPassword);
    } else if (!preg_match($regexPass, $password)) {
        echo $errorPassword = "Veuillez renseigner un mot de passe valide ! (au moins une minuscule, une majuscule, un chiffre et un caractère spécial)";
        array_push($array_verif, $errorPassword);
    } else {
        echo "Ok !";
    }

    // Verify second e-mail
    if (empty($password2)) {
        echo $errorPassword2 = "Veuillez confirmer le mot de passe";
        array_push($array_verif, $errorPassword2);
    } else if (!preg_match($regexPass, $password2)) {
        echo $errorPassword2 = "Veuillez renseigner un mot de passe valide ! (au moins une minuscule, une majuscule, un chiffre et un caractère spécial)";
        array_push($array_verif, $errorPassword2);
    } else if ($password != $password2) {
        echo $errorPassword2 = "Veuillez renseigner le même mot de passe !";
        array_push($array_verif, $errorPassword2);
    } else {
        echo "Ok !";
    }
    //TODO: Faire la virfication pour savoir si l'utilisateur n'existe pas déjà
    if (empty($array_verif)) {
        $db = connexionBase();
        $stmt = $db->prepare("INSERT INTO users (`use_lastname`,`use_firstname`,`use_mail`,`use_password`,`use_d_register`) VALUES (:use_lastname, :use_firstname, :use_mail, :use_password, :use_d_register)");
        $stmt->bindValue(':use_lastname', $lastname);
        $stmt->bindValue(':use_firstname', $firstname);
        $stmt->bindValue(':use_mail', $email);
        $stmt->bindValue(':use_password', password_hash($password, PASSWORD_BCRYPT));
        $stmt->bindValue(':use_d_register', $dateRegister);
        $stmt->execute();
        include 'mail.php';
        welcome_mail();
        header('Location:../index.php');
    }
}

if (isset($_POST['loginButton'])) {
    verif_login();
} else if (isset($_POST['register'])) {
    verif_register();
}
