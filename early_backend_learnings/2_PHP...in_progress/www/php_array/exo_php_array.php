<html>
<body>
    <h1>Exercices</h1>
    <h3>Enoncé</h3>
        <p>Le tableau $a ci-dessous représente les plannings de groupes de stagiaires.</p>
        <p>Le code 19XXX représente le numéro de groupe.</p>
        <p>Les positions correspondent aux numéros de semaines dans l'année (peu importe quelle année).</p>
        <p>Les valeurs vides ("") en début et fin de tableau indiquent respectivement que la formation n'a pas commencé / est terminée.</p>
        <p>Quand une formation a débuté, les cellules vides indiquent des vacances.</p>


    <?php
        $a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"), 
                    "19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""), 
                    "19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation") 
                    );

        var_dump($a);
    ?>
    <hr>
    <h2>Exercice 1</h2>
    <p>Quelle semaine a lieu la validation du groupe 19002 ?</p>
    <?php
    foreach ($a["19002"] as $key => $value){
        if ($value === "Validation"){
            echo "La validation pour le groupe 19002 se fera lors de la ".++$key."ème semaine. <br>";
        }
    }

    // OR

    $val = array_search("Validation", $a["19002"]);
    echo "La validation pour le groupe 19002 se fera lors de la ".++$val."ème semaine.";
    ?>
    <hr>
    <h2>Exercice 2</h2>
    <p>Trouver la position de la dernière occurrence de Stage pour le groupe 19001.</p>
    <?php
        $stage = array_reverse($a["19001"], true);
        $pos = array_search("Stage", $stage);
        echo "La dernière occurrence de Stage pour le groupe 19001 se trouve à la position ".++$pos;
    
    ?>
    <hr>
    <h2>Exercice 3</h2>
    <p>Extraire, dans un nouveau tableau, les codes des groupes.</p>
    <?php
    $new_tab = [];
    foreach ($a as $key => $value){
        array_push($new_tab, $key);
    }
    var_dump($new_tab);
    ?>
    <hr>
    <h2>Exercice 4</h2>
    <p>Combien de semaines dure le stage du groupe 19003 ?</p>
    <?php
    $counts =array_count_values($a["19003"]);
    echo "Le stage du groupe 19003 dure ".$counts["Stage"]." semaines.";
    
    ?>

</body>
</html>