<h2>Example d'ouverture de fichier</h2>
<p>$fp = fopen("/home/rasmus/file.txt", "r") : "r" allow for read only the file (from the begining)</p> 
<p>$fp = fopen("http://www.php.net/", "r")</p>
<p>$fp = fopen("../exemple.txt","a") : "a" allow for the writing on the file (from the begining)</p>
<p>$fp = fopen("ftp://user:password@example.com/", "w") : "w" allow the writing on for the file (from the end)</p>

<h2>Ecriture d'un fichier</h2>
<p>Fonction <strong style="background-color:lightgrey;">fputs($fp, $str, lenght);</strong> :</p>
<ul>
    <li>$fp : point sur le numéro de fichier ouvert par fopen()</li>
    <li>$str : représente la variable à enregistrer</li>
    <li>length : 3<sup>ème</sup> argument, facultatif, qui représente la longueur de la variable</li>
</ul>

<h3>syntaxe : </h3>
<p>$myVar = "Bonjour le monde \n";  -> On déclare une variable dont la valeur (contenu) sera écrite dans le fichier</p>
<p>$fp = fopen("examples.txt", "a"); -> Ouverture en écriture seule</p>
<p>fputs($fp, $myVar); -> Ecriture du contenu ($myVar) </p>
<p>fclose($fp); -> fclose($fp);</p> 

<?php
    // On déclare une variable dont la valeur (contenu) sera écrite dans le fichier
    $myVar = "Bonjour le monde \n";
        
    // Ouverture en écriture seule 
    $fp = fopen("examples.txt", "a"); 
        
    // Ecriture du contenu ($myVar) 
    fputs($fp, $myVar); 

    // Fermeture du fichier  
    fclose($fp); 
?>
<h2>Lecture d'un fichier</h2>
<p>Fonction <strong style="background-color:lightgrey;">fgets($fp, length);</strong>:</p>
<ul>
<li>$fp : pointe sur la ressource de fichier ouvert avec fopen() </li>
<li>length : représente la longueur d'enregistrement à lire (en octets) </li>
</ul>

<h3>Texte présent dans le fichier "examples.txt" :</h3>
<?php
    // Ouverture en lecture seule  
    $fp = fopen("examples.txt", "r"); 
    // Boucle jusqu'à la fin du fichier
    while (!feof($fp)) 
    { 
        // Lecture d'une ligne, le contenu de la ligne est affecté à la variable $ligne  
        $ligne = fgets($fp, 4096); 
        echo $ligne."<br>"; 
    } 
?>

<h2>Autres fonctions PHP</h2>
<ul>
    <li><strong style="background-color:lightgrey;">basename("path", "suffixe");</strong>  -> retourne le nom de la composante finale d'un chemin. Si le suffixe est présent, il est alors supprimé</li>
    <li><strong style="background-color:lightgrey;">copy("path", "destination", contexte);</strong> -> fait une copie du fichier source (path) vers le fichier de destination. Pour le contexte, voir la fonction  <strong style="background-color:lightgrey;">stream_context_create()<strong> </li>
    <li><strong style="background-color:lightgrey;">dirname("path", level);</strong>  -> renvoie le chemin du dossier parent. level permet de définir jusqu'ou on souhaite remonter</li>
    <li><strong style="background-color:lightgrey;">file_exists("path");</strong>  -> vérifie si un fichier ou un dossier existe (retourne true). </li> 
    <!--  //computername/share/filename ou \\\\computername\share\filename -->
    <li><strong style="background-color:lightgrey;">is_dir("path");</strong> -> indique si le fichier est un dossier (En cas d'échec, une alerte de type E_WARNING sera émise.)</li>
    <li><strong style="background-color:lightgrey;">is_file("path");</strong> -> Indique si le fichier est un véritable fichier</li>
</ul>