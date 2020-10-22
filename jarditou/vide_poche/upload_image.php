<?php

if(isset($_POST['submit']))
    {
        // $maxSize = 50000; Permet de définir la taille maximal du fichier uploader
        
        // Tableau pour les extensions valides
        $validExt = array ('.jpg','jpeg','.gif','.png', '.pjpeg', '.x-png', '.tiff');

        // Permet de traiter s'il y a une erreur
        if($_FILES['uploaded_file']['error'] > 0) // "uploaded_file" représente le name de l'input. On va chercher l'erreur dans la vraible superglobale
        {
            //TODO: vérifier comment gérer les erreurs
            Echo "Une erreur est survenue lors du transfert !";
            die;
        }
        // Permet de tester la taille du fichier
        $fileSize = $_FILES['uploead_file']['size']; //ici on va chercher la taille dans la variable superglobale

        if($fileSize > $maxSize)
        {
            Echo "Le fichier est trop gros !";
            die;
        }

        $fileName = $_FILES['uploaded_file']['name']; // permet de récupérer le nom du fichier uploader
        $fileExt = ".". strtolower(substr(strrchr($fileName, '.'), 1)); 
        /*permet de récupérer l'extension du fichier uploadé
        "strtolower" permet de gérer les extensions en majuscule
        "substr" permet de 
        "strrchr" permet de 
        */

        // Permet de vérifier si l'extension est dans l'array
        if(!in_array($fileExt, $validExt))
        {
            Echo "Le fichier n'est pas une image !";
            die;
        }

        // Pour transférer le fichier uploadé dans un autre fichier (il est mis par défaut d'un le fichier tmp)
        $tmpName = $_FILES['uploead_file']['tmp_name']; //permet de récupérer le nom et le chemin du fichier temporaire 
        $uniqueName = md5(uniqid(rand(), true)); //permet de donner un nom random unique  à l'image
        $fileName = "upload/" . $uniqueName . $fileExt; // $fileName = "newPathFile" . newNameFile . uploadedExtensionFile;
        $resultat = move_uploaded_file($tmpName, $fileName); //Permet de s'assurer que le fichier est un fichier téléchargé et retourne true quand c'est bon.
        // Un fichier existant sera écrasé
        if($resultat)
        {
            echo " Transfert terminé !";
        }
    }