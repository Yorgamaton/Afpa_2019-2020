<h1>Exercices</h1>
<p>Utilisez l'objet DateTime, sauf mention contraire.</p>
<?php
date_default_timezone_set("Europe/Paris"); //Permet d'appliquer le fuseau horaire de Paris
?>
<h2>Exercice 1</h2>
<p>Affichez la date du jour au format mardi 2 juillet 2019.</p>

<?php
setlocale(LC_TIME, "fra.UTF-8", "fr_FR"); //permet d'afficher la date sous le format que l'on choisit : ici France
echo strftime('%A %#d %B %Y');
?>

<h2>Exercice 2</h2>
<p>Trouvez le numéro de semaine de la date suivante : 14/07/2019.</p>

<?php
    $date = "14-07-2019";
    $ddate = new DateTime($date);
    $week = $ddate->format("W");
    echo "La date du ".$date." correspond à la ".$week."ème semaines";

// // Code de Claude
// // récupératin des valeurs de la date courante
// $dayName = $date->format('j'); //=> récupération du numéro du jour de la semaine (1 => lundi, ...., 7 => dimanche)
// $dayNumber = $date->format('N'); // => récupération du numéro du jour dans le mois
// $year = $date->format('Y'); // récupération de l'année
// $monthName = $date->format('n'); // => // Numéro du mois, sans 0 initial
// // tableau des jours, première valeur vide
// $dayList = ['', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
// // Attention, 1 à 12, donc un vide au début pour la position 0
// $monthList = ['', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];


?>

<h2>Exercice 3</h2>
<p>Combien reste-t-il de jours avant la fin de votre formation.</p>

<?php
$end_training = new DateTime("31-07-2020");
$today = date_create(date("d-m-Y"));
$remain = date_diff($today, $end_training);
echo $remain->format('Il reste %a jours (%m mois et %d jours) avant la fin de la formation.');
?>

<h2>Exercice 4</h2>
<p>Reprenez l'exercice 3, mais traitez le problème avec les fonctions de gestion du timestamp, time() et mktime().</p>


    <h4>->Test avec 'mktime()'</h4>
        <?php
            echo "Résultat de 'mktime' : ".date("d-m-Y", mktime(0, 0, 0, 07, 31, 2020));

            $end_training = date_create(date("d-m-Y", mktime(0, 0, 0, 07, 31, 2020)));
            $today = date_create(date("d-m-Y"));
            $remain = date_diff($today, $end_training);
            echo "<br>".$remain->format('Il reste %a jours (%m mois et %d jours) avant la fin de la formation.');

        ?>

    <h4>->Test avec 'time()'</h4>
        <?php
            echo "Le résultat de 'time()' est : ".time();

            $end_training = date_create(date("d-m-Y", mktime(0, 0, 0, 07, 31, 2020)));
            $today = date_create(date("d-m-Y", time()));
            $remain = date_diff($today, $end_training);
            echo "<br>".$remain->format('Il reste %a jours (%m mois et %d jours) avant la fin de la formation.');

        ?>

    <h4>->Test avec 'timestamp'</h4>
        <?php
            echo "Le résultat de 'timestamp' est : ".date_timestamp_get(date_create());

            $end_training = date_create(date("d-m-Y", mktime(0, 0, 0, 07, 31, 2020)));
            $today = date_create(date("d-m-Y", date_timestamp_get(date_create())));
            $remain = date_diff($today, $end_training);
            echo "<br>".$remain->format('Il reste %a jours (%m mois et %d jours) avant la fin de la formation.');

        ?>


<h2>Exercice 5</h2>
<p>Quelle sera la prochaine année bissextile ?</p>

<?php
    function bissextile($annee) {
        if( (is_int($annee/4) && !is_int($annee/100)) || is_int($annee/400)) {
            // Année bissextile
            // vous remplacez le retour par ce que vou voulez
            return TRUE;
        } else {
            // Année NON bissextile
            // vous remplacez le retour par ce que vou voulez
            return FALSE;
        }
    }

    function est_bissextile($annee)
        {
            return date("m-d", strtotime("$annee-02-29")) == "02-29";
        }    
        
    
    $year = date('2021');

    for($year; $year<=date('2050'); $year++) {
        if(est_bissextile($year)) {
            echo '<strong>' . $year . ' est la prochaine année Bissextile</strong><br>';
        break;
        }
    }

?>

<h2>Exercice 6</h2>
<p>Montrez que la date du 17/17/2019 est erronée.</p>

<?php
    $date = "17/17/2019";
    list($dd, $mm, $yyyy) = explode('/',$date);
    if (!checkdate($mm, $dd, $yyyy))
    {         
        echo"Le ".$date." est une date erronée.";
    }else{
        echo"Le ".$date." est une date valide.";
    }
?>

<h2>Exercice 7</h2>
<p>Affichez l'heure courante sous cette forme : 11h25.</p>

<?php
    echo "Il est ".(date("H\hi")).".";
?>

<h2>Exercice 8</h2>
<p>Ajoutez 1 mois à la date courante</p>

<?php
    $date = date_create(date("d-m-Y")); 
    echo "Date d'aujourd'hui : \n", $date->format("d-m-Y"), "<br>";
    $date-> modify("+1 month");
    echo "Date dans un mois :   ", $date->format("d-m-Y");
    /* Si l'on veut gérer l'erreur qu'il peut y avoir avec avec le mois de février
    utiliser : $date->modify("last day of next month");*/
?>
