
<h1>Un compteur texte en PHP :</h1>
<form action="exercises.php">
    <input type="submit" value="Try it"/>
</form>
<?php 
    

    // On ouvre le fichier moncompteur.txt. r+ permet de le l'ouvrir en lecture et écriture
    $fichier = fopen("counter.txt","r+");

    /* on lit le nombre indiqué dans ce fichier dans la variable. 255 permet de ne lire que la première ligne. 
    On pourrait également mettre 4 si l'on sait que le compteur ne dépassera pas 9999.*/
    $visiteurs = fgets($fichier,255);

    // on ajoute 1 au nombre de visiteurs
    $visiteurs++;
        
    // on se positionne au début du fichier et permet ainsi de supprimer l'ancien nombre
    fseek($fichier,0);
        
    // on écrit le nouveau nombre incrémenté dans le fichier. 
    fputs($fichier,$visiteurs);
        
    // on referme le fichier moncompteur.txt ouvert au début du script
    fclose($fichier);
        
    // on indique sur la page le nombre de visiteurs
    if ($visiteurs ==1){
        print("$visiteurs personne est passée par ici"); 
    }else{
        print("$visiteurs personnes sont passées par ici");
    }
?>

<h1>Parcourir un répertoire :</h1>
    <ul>
        <li>avec la function "scandir("path", sorting_order)"</li>
        <p> Liste les fichiers et dossiers dans un dossier </p>
        <p>sorting_order :</p>
        <ol> 
        <li>SCANDIR_SORT_DESCENDING</li>
        <li>SCANDIR_SORT_NONE</li>
        </ol>
            <?php
                $dir = '../../files';
                $files1 = scandir($dir); //"1" inverse l'ordre des éléments mais ne garde pas l'index
                echo "<br>";
                print_r($files1);
            ?>
        <li>Boucle récursive pour scanner un dossier et ses sous-dossiers</li>
        <!-- TODO: voir comment faire la boucle récursive -->
        <?php
        function recursive_scan(){
            $dir = '../../files';
            $files = scandir($dir);

            foreach($files as $key){
                var_dump ($key);
                echo "<br>";
            }
        }
        recursive_scan();

        ?>
    </ul>

<h1>La sécurité des fichiers : <h2>droits/chmod().</h2></h1>


<p>Vérifier si le code est mis en commentaire avant de s'en servir !</p>

<form action="exercises.php" method="POST" enctype="multipart/form-data">
<input type="file" name="fichier">
<input type="submit">
</form>

<?php
    // On met les types autorisés dans un tableau (ici pour une image)
    $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
    
   if($_FILES['fichier']['error'] > 0) // "uploaded_file" représente le name de l'input. On va chercher l'erreur dans la vraible superglobale
        {
           //TODO: voir pour créer une tableau d'erreur
            Echo "Une erreur est survenue lors du transfert !";
            die;
        }
        
   // On extrait le type du fichier via l'extension FILE_INFO 
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);
    finfo_close($finfo);
    
    if (in_array($mimetype, $aMimeTypes))
    {
        $fileExt = ".".basename($_FILES["fichier"]["type"]); 
       //OR
       // $fileExt = ".". strtolower(substr(strrchr($mimetype, '/'), 1)); 
    
        /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
       déplacer et renommer le fichier */
       $tmpName = $_FILES['fichier']['tmp_name']; //permet de récupérer le nom et le chemin du fichier temporaire 
       $uniqueName = md5(uniqid((rand()))); //permet de donner un nom random unique  à l'image
       $fileName = "img/" . $uniqueName . $fileExt; // $fileName = "newPathFile" . newNameFile . uploadedExtensionFile;
       $resultat = move_uploaded_file($tmpName, $fileName); //Permet de s'assurer que le fichier est un fichier téléchargé et retourne true quand c'est bon.
    
    } 
    else 
    {
      // Le type n'est pas autorisé, donc ERREUR
        echo "Type de fichier non autorisé";    
        exit;
    } 
?>

<!-- Changer le mode -->
<h3>Pour changer le mode du fichier : </h3>
<ul>
    <li>Lecture et écriture pour le propriétaire, rien pour les autres :
        <p>chmod('/somedir/somefile', 0600)</p></li>
    <li>Lecture et écriture pour le propriétaire, lecture pour les autres :
        <p>chmod('/somedir/somefile', 0644)</p></li>
    <li>Tout pour le propriétaire, lecture et exécution pour les autres :
        <p>chmod('/somedir/somefile', 0755)</p></li>
    <li>Tout pour le propriétaire, lecture exécution pour le groupe, rien pour les autres :
        <p>chmod('/somedir/somefile', 0750)</p></li>
</ul>
<a href="https://codex.wordpress.org/fr:Modifier_les_Permissions_sur_les_Fichiers">Modifier les persissions sur les fichiers</a><br>
<a href="https://www.php.net/manual/fr/function.chmod.php"> chmod ( string $filename , int $mode ) : bool</a>



<h1>Exercices avec des liens hypertextes :</h1>
<ul>
    <?php
        // Ouverture en lecture seule  
        $fp = fopen("ListeLiens.txt", "r"); 
        // Boucle jusqu'à la fin du fichier
        while (!feof($fp)) 
        { 
            // Lecture d'une ligne, le contenu de la ligne est affecté à la variable $ligne  
            $ligne = fgets($fp, 4096); 
            if ($ligne){
                echo "<li><a href='".$ligne."'>".$ligne."<a></li>"; 
            }
            else if ($ligne == ""){
                echo "";
            }
        } 
    ?>
</ul>
<?php