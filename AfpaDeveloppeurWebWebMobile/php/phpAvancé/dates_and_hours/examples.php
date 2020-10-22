<?php
date_default_timezone_set("Europe/Paris"); //Permet d'appliquer le fuseau horaire de Paris

echo "<p>Il y a ".time()." secondes qui se sont écoulées depuis l'apparition d'Unix (1er janvier 1970)</p>"; 

// La date du jour
    echo "<h3><u>Test pour afficher la date d'aujourd'hui</u></h3>";

    $date = date("d/m/Y");
    echo"<p>Nous sommes le ".$date."</p>";

// L'heure actuelle
    echo "<h3><u>Test pour afficher l'heure actuelle</u></h3>";

    echo "<p> Il est ". date("H\hi")." (et ".date("s")." secondes).<p>";

/* Afin de manipuler des dates, on va devoir utiliser l'objet natif "DateTime"
on déclare une instance de l'objet PHP 'DateTime' : 
Ce code retourne la date et l'heure à l'instant où il est exécuté
*/
    echo "<h3><u>Test pour afficher l'objet 'DateTime'</u></h3>";

    $oDate = new DateTime();
    var_dump($oDate);
    echo "<br>";
    echo "<h4><u>-> avec une date en paramètre</u></h4>";

    // on spécifie la date lorsque l'on veut trailler sur une date présente dans la base de donnée par exemple.
    $oDate = new DateTime("01-01-2018");
    var_dump($oDate);
    echo "<br>";

    echo "<h4><u>-> avec une date en paramètre à partir d'une base de données</u></h4>";
        /* Toujours pour accéder à une date dans une base de données, 
        Ici $macolonne_sql est issue d'une requête SQL; avec pour valeur 2018-11-16 11:26:51 (par exemple)
        */ 
        $oDate = new DateTime($macolonne_sql); //pour cela il faudrait avoir la base de données avec la requête
        echo $oDate->format("d/m/Y H:i");


//Exemples de pièges arithmétique de DateTime en ce qui concerne le transitions DST et les mois ayant un nombre différent de jours

// https://www.php.net/manual/fr/datetime.examples-arithmetic.php


// Test regex date : ne valide que le format et pas les valeurs.
    echo "<h3><u>Test pour vérifier le format de la date</u></h3>";

    $datePattern = "/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/";
    $date = "2019-13-32";

    if (preg_match($datePattern, $date)) 
    {
        echo "<p>Date ".$date." valide.</p>";
    }
    else 
    {
        echo "<p>Date ".$date." erronée.</p>";
    } 


//Pour vérifier les valeurs de la date
    echo "<h3><u>Test pour vérifier les valeurs de la date</u></h3>";

    $date = "01/10/2019";
    /* 
    On découpe la chaîne $date selon '/' avec la fonction explode() qui retourne un tableau 
    Les éléments du tableau sont directement afffecté à des variables ($dd, $mm, $yyyy) dans un ordre respectif grâce à la fonction list()      
    */

    list($dd, $mm, $yyyy) = explode('/', $date);

    /* Les variables $dd, $mm, $yyyy sont des chaînes, or la fonction checkdate()  
    n'accepte que des entiers
    */

    echo "Le jour est actuellement un <strong><u>".gettype($dd)."</u></strong>"; // indique que $dd est une chaîne
    echo "<br>";
    if (!checkdate($mm, $dd, $yyyy))
    {         
        echo"Date ".$date." est erronée.";
    }else{
        echo"Date ".$date." est valide.";
    }

    /* On va donc 'caster' c'est-à-dire changer le type d'une variable,
    ici on veut un entier, la syntaxe est de l'indiquer avec (int) 
    devant la variable
    */ 

    $dd = (int) $dd;
    echo "<br>";
    echo "Le jour est maintenant un <strong><u>".gettype($dd)."</u></strong>"; // $dd est désormais bien un entier
    $mm = (int) $mm;
    $yyyy = (int) $yyyy;
    echo "<br>";
    if (!checkdate($mm, $dd, $yyyy))
    {         
        echo"Date ".$date." est erronée.";
    }else{
        echo"Date ".$date." est valide.";
    }
    echo "<h4><u>-> Test d'une date qui n'est pas valide</u></h4>";

        $date = "29/02/2001";
        list($dd, $mm, $yyyy) = explode('/', $date);
        $dd = (int) $dd;
        $mm = (int) $mm;
        $yyyy = (int) $yyyy;
        if (!checkdate($mm, $dd, $yyyy))
        {         
            echo"Date ".$date." est erronée.";
        }else{
            echo"Date ".$date." est valide.";
        }


echo "<h3><u>Test pour récupérer les erreurs de l'objet 'DateTime' grâce à 'DateTime::getLastErrors'</u></h3>";

    echo "<h3>Style orienté objet</h3>";
        try {
            $date = new DateTime('asdfasdf');
        } catch (Exception $e) {
            // Juste pour l'exemple...
            print_r(DateTime::getLastErrors());

            // Manière orientée objets de gérer les erreurs (exceptions)
            // echo $e->getMessage();
        }

    echo "<h3>Style procédural</h3>";
        $date = date_create('asdfasdf');
        print_r(date_get_last_errors());
    
    echo "<br>";

    echo "<h3>Récupérer les erreurs de l'objet</h3>";
        $dateTime = DateTime::createFromFormat('m/d/Y', $date);
        $errors = DateTime::getLastErrors();
        if (!empty($errors['warning_count'])) 
        {
            var_dump ($errors);
            return FALSE;
        }
        //le résultat de la condition précédente
        echo "<img src='error.png'>";
