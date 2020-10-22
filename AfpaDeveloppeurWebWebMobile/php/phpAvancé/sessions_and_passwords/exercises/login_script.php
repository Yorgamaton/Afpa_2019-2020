<?php
include 'util.php';
session_start();

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
        $sql = $db->prepare("SELECT * FROM `user` WHERE `user_login`=:user_login");
        $sql->bindValue(':user_login', $login);
        $sql->execute();        
        $row = $sql->fetch(PDO::FETCH_OBJ);
        if ($row) 
        {
            if(password_verify($password, $row->user_password))
            {
                $_SESSION['username'] = $login;
                header('Location:exercises.php');
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
        header('Location:exercises.php');
    }


}


function verif_register()
{
    $email = check_values($_POST['loginRegister']);
    $password = check_values($_POST['passwordRegister']);
    $password2 = check_values($_POST['passwordConfirm']);

    $errorMail = $errorPassword = $errorPassword2 = "";

    $regexMail = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
    $regexPass = "/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";


    $array_verif = [];
    //verify email
    if (empty($email)) {
        echo $errorMail = "Veuillez renseigner un e-mail";
        array_push($array_verif, $errorMail);
    } else if (!preg_match($regexMail, $email)) {
        echo $errorMail = "Veuillez renseigner un e-mail valide !";
        array_push($array_verif, $errorMail);
    } else {
        echo "Ok";
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

    if (empty($array_verif)) {
        $db = connexionBase();
        $stmt = $db->prepare("INSERT INTO user (`user_login`, `user_password`) VALUES (:user_login, :user_password)");
        $stmt->bindValue(':user_login', $email);
        $stmt->bindValue(':user_password', password_hash($password, PASSWORD_BCRYPT));
        $stmt->execute();
        header('Location:exercises.php');
    }
}


if (isset($_POST['loginButton'])) {
    verif_login();
} else if (isset($_POST['register'])) {
    verif_register();
}
