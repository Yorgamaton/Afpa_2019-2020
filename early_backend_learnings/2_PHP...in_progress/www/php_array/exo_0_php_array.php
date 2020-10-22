<html>
<body>
    <h2>Exercice 0</h2>
    <p>Testez les différents exemples du cours, à l'aide de la fonction var_dump()</p>
    <h3>Tableaux indexés</h3>
    <?php
    echo "<p><u>EXEMPLE 1 :</u></p>";
    $tab = array();
    var_dump($tab);
    echo "<br>";

    echo "<p><u>EXEMPLE 2 :</u></p>";
    $tab = [];
    var_dump($tab);
    echo "<br>";

    echo "<p><u>EXEMPLE 3 :</u></p>";
    $tab[] = "Pomme"; 
    $tab[] = "Poire"; 
    $tab[] = "Banane"; 
    var_dump($tab);
    echo "<br>";

    echo "<p><u>EXEMPLE 4 :</u></p>";
    $tab[0] = "Pomme"; 
    $tab[1] = "Poire"; 
    $tab[2] = "Banane"; 
    var_dump($tab);
    echo "<br>";

    ?>
<hr>
<h3>Tableaux à plusieurs dimensions</h3>
    <?php
    echo "<p><u>EXEMPLE 1 :</u></p>";
    $tab = array(array(1, "janvier", "2016"), 
                array(2, "février", "2017"),
                array(3, "mars", "2018"), 
                array(4, "avril", "2019")
                );
    var_dump($tab);
    echo "<br>";

    echo "<p><u>EXEMPLE 2 :</u></p>";
    $tab[] = array(1, "janvier", "2016"); 	
    $tab[] = array(2, "février", "2017"); 	
    $tab[] = array(3, "mars", "2018"); 	
    $tab[] = array(4, "avril", "2019");
    var_dump($tab);
    echo "<br>";
    echo "<p><u> Accès aux données : </u></p>";
    // Affiche : 3 mars 2018
    echo $tab[2][0]." ".$tab[2][1]." ".$tab[2][2]."<br>"; 
    ?>
<hr>
<h3>Tableaux associatifs</h3>
    <?php
    echo "<p><u>EXEMPLE 1 : première façon de le faire</u></p>";
    $facture[0] = 500; // représente Janvier / 500 euros
    $facture[1] = 620; // représente Février 
    // $... 
    $facture[11]= 300; // représente Décembre    
    var_dump($facture);
    echo "<br>";

    echo "<p><u>EXEMPLE 2 : seconde façon</u></p>";
    $facture["Janvier"] = 500; 
    $facture["Février"] = 620; 
    // $........ 
    $facture["Décembre"] = 300;     
    var_dump($facture);
    echo "<br>";

    echo "<p><u>EXEMPLE 3 : troisième façon</u></p>";
    $facture = array("Janvier" => 500, "Février" => 620, "Décembre" => 300); 
    var_dump($facture);

    ?>
<hr>
<h3>Manipulation de tableaux</h3>
    <?php
    echo "<p><u>Taille d'un tableau :</u></p>";
    $mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	echo count($mois); // Affiche 12  
    echo "<br>";

    echo "<p><u>Lecture d'un tableaux :</u></p>";
    $factures = array("Janvier" => 500, "Février" => 620, "Mars" => 300, "Avril" => 130, "Mai" => 560, "Juin" => 350); 
    $total_annuel = 0;
    foreach ($factures as $value) 
    { 
        echo $value." &euro;<br>"; 
        $total_annuel += $value;        
    } 
    echo "Total annuel de vos factures téléphoniques : ".$total_annuel." &euro;";     
    echo "<br>";

    echo "<p><u>Lecture d'un tableaux : en affichant également le mois :</u></p>";
    $factures = array("Janvier" => 500, "Février" => 620, "Mars" => 300, "Avril" => 130, "Mai" => 560, "Juin" => 350); 
    $total_annuel = 0;
    foreach ($factures as $key => $value) { 
    echo "Facture du mois de ".$key." : ".$value." €"; $total_annuel += $value;
    } 

    echo "<p><u>La fonction 'array_push()' :</u></p>";
    $tab = array("Lundi", "Mardi", "Mercredi", "Jeudi"); 
    var_dump($tab);
    array_push($tab, "Vendredi"); 
    echo "<br>";
    var_dump($tab);

    echo "<p><u>La fonction 'array_pop()' :</u></p>";
    $tab = array("Lundi", "Mardi", "Mercredi"); 
    var_dump($tab);
    $jour = array_pop($tab);
    echo "<br>";
    var_dump($tab);

    echo "<p><u>La fonction 'array_unshift()' :</u></p>"; 
    // ajouter une où plusieurs valeurs au début du tableau
    $tab = array("Jeudi", "Vendredi"); 
    array_unshift($tab, "Lundi", "Mardi", "Mercredi"); 
    var_dump($tab);

    echo "<p><u>La fonction 'array_shift()' :</u></p>";
    // retirer uniquement la première valeur du tableau
    $tab = array("Jeudi", "Vendredi"); 
    var_dump($tab);
    echo "<br>";
    $jour = array_shift($tab); 
    var_dump($tab);

    echo "<p><u>La fonction 'array_unset()' :</u></p>";
    $tab = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"); 
    var_dump($tab);
    unset($tab[2]); // l'index de l'élément à supprimer
    echo "<br>";
    var_dump($tab);
    
    echo "<p>A noter qu'après une suppression de ligne les index ne se suivent plus<br>
    array (size=4)<br>
        0 => string 'Lundi' (length=5)<br>
        1 => string 'Mardi' (length=5)<br>
        3 => string 'Jeudi' (length=5)<br>
        4 => string 'Vendredi' (length=8)<br>
    <br>
    On va alors utiliser la fonction suivante:<br>
    $tab = array_values($tab);<br>
    <br>
    Le tableau affichera alors :<br>
    array (size=4)<br>
        0 => string 'Lundi' (length=5)<br>
        1 => string 'Mardi' (length=5)<br>
        2 => string 'Jeudi' (length=5)<br>
        3 => string 'Vendredi' (length=8)</p>";

    ?>

<hr>
<h3>Tris de tableaux</h3>
    <?php
    echo "<p><u>La fonction 'sort()' :</u></p>"; //tri croissant
    $prenoms = array("Franck", "Laurent", "Caroline", "Magali", "Véronique");    
    sort($prenoms);
    for ($i = 0; $i <= count($prenoms)-1; $i++) 
    {
        echo $prenoms[$i]."<br>";
    }

    echo "<p><u>La fonction 'rsort()' :</u></p>"; //tri décroissant
    $prenoms = array("Franck", "Laurent", "Caroline", "Magali", "Véronique");  
    rsort($prenoms);
    for ($i = 0; $i <= count($prenoms)-1; $i++) 
    {
        echo " ".$prenoms[$i]."<br>";
    }


    echo "<p><u>La fonction 'asort()' :</u></p>"; //tri croissant où l'indexation des clés est conservée
    $tab = array("a" => "Lundi",
                "b" => "Mardi",
                "c" => "Mercredi",
                "d" => "Jeudi",
                "e" => "Vendredi"
                ); 
    asort($tab);  
    foreach ($tab as $cle => $valeur) 
    { 
    echo $cle ." : ".$valeur."<br>"; 
    }

    echo "<p><u>La fonction 'arsort()' :</u></p>"; // tri décroissant où l'indexation des clés est conservée
    $tab = array("a" => "Lundi",
                "b" => "Mardi",
                "c" => "Mercredi",
                "d" => "Jeudi",
                "e" => "Vendredi"
                ); 
    arsort($tab);  
    foreach ($tab as $cle => $valeur) 
    { 
    echo $cle ." : ".$valeur."<br>"; 
    }
    ?>


<!-- array_reverse() inverser l'ordre d'un tableau (prereverse inverse aussi l'index)-->
<!-- array_key_exists() on vérifie si une clé existe -->
<!-- array_keys() Retourne toutes les clés ou un ensemble des clés d'un tableau-->
<!-- array_merge() fusionne des tableaux en supprimant les valeurs du tableau 1 où les clés 
sont identique dans le tableau 2 
    A noter que l'on peut également faire l'addition de deux tableau, à l'inverse que 
    les valeurs du tableau 1 sont conservées et celles du deux supprimées (aillant la même clé) -->
<!-- array_diff() voir ce qu'ils ont de différent-->
<!-- array_intersect() voir ce qu'ils ont en commun-->
<!-- array_column()  Retourne les valeurs d'une colonne d'un tableau d'entrée -->
<!-- array_count_values() Compte le nombre de valeurs d'un tableau -->
<!-- array_search() Recherche dans un tableau la clé associée à la première valeur
Il y a que la première clé qui est renvoyé
    A noter que si l'on souhaite obtenir toutes les clés, on va plutôt utiliser la fonction 'array_keys()'-->
<!-- array_slice() Extrait une portion de tableau
    A noter que l'on peut conserver l'index en utilisant le paramètre 'preserve_key' et en le définissant comme true-->
<!-- array_splice() Efface et remplace une portion de tableau -->
<!-- array_unique() Dédoublonne un tableau : extrait du tableau les valeurs distinctes et supprime tous les doublons -->
<!-- explode() Scinde une chaîne de caractères en segments en indiquant un séparateur -->
<!-- extract() Importe les variables dans la table des symboles -->
<!-- implode() (= join()) Rassemble les éléments d'un tableau en une chaîne-->
<!-- list() Assigne des variables comme si elles étaient un tableau -->
<!-- in_array()  Indique si une valeur appartient à un tableau => retourne true si needle est trouvé, sinon False.  -->
<!-- shuffle() Mélange les éléments d'un tableau : pas conseillé pour de la cryptographie, fonctionne sur un booléen -->

</body>
</html>