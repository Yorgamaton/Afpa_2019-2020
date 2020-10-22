<?php

function connexionBase()
{
    // Paramètre de connexion serveur
    $host = "localhost";
    $login= "root";     // Votre loggin d'accès au serveur de BDD
    $password="";    // Le Password pour vous identifier auprès du serveur
    $base = "test_session";    // La bdd avec laquelle vous voulez travailler

    try
    {
        $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password);
        return $db;
    }
    catch (Exception $e)
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    }
}

// Fonction qui permet de vérifier si la connexion s'est bien passé
// function new_session()
// {
//     if (!session_id()) // We verify if there are a session id
//     {
//         session_start();
//         session_regenerate_id(true); // true delete old session
//         echo session_id();
//         return true;
//     }
//     return false;
// }

//Fonction qui permet de fermer proprement la session
function end_session()
{
    $_SESSION["username"] = "";
    // $_SESSION["rank"] = "";

    // session_unset();
    /* OR
    */
    unset($_SESSION["username"]);
    // unset($_SESSION["role"]);
    // session_write_close(); // allow to save data's session and delete the session
    if (ini_get("session.use_cookies"))
    {
        setcookie(session_name(), '', time()-42000);
        /*
        Or setcookie(session_name(), '', 0, null, null, false, true);
        session_name() allow to get or modify the session's name
        */
    }
    session_destroy();
}


// fonction qui permet d'autoriser l'accès a telle ou telle page
function is_logged() : bool
{
    if (isset($_SESSION['username'])) 
    {
        return true;
    }
    return false;
}
//Fonction qui permet de vérifier s
function is_admin() : bool
{
    if (is_logged()) 
    {
        if (isset($_SESSION['rank']) && $_SESSION['rank'] == 1) 
        {
            return true;
        }
        return false;
    }
    return true;
}