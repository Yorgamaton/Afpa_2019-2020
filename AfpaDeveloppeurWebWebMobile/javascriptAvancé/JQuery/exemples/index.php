<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/prism.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/selecteur.css">
    <link rel="stylesheet" href="assets/css/manipObjet.css">
    <link rel="stylesheet" href="assets/css/addModifyDelContent.css">
    <link rel="stylesheet" href="assets/css/gestionForm.css">
    <link rel="stylesheet" href="assets/css/effets.css">    
    <title>JQuery</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="wrapperHeader">
                <div class="headerBox1">
                    <img src="assets/images/header.png" id="imgHeader" alt="">
                </div>
                <div class="headerBox2">
                    <p>"jQuery est une bibliothèque JavaScript libre et multiplateforme créée pour faciliter l'écriture de scripts côté client dans le code HTML des pages web"</p>
                </div>
            </div>
        </header>

        <main>

            <?php 

            // Fichier contenant le cours sur les sélecteurs
            include 'selecteur.php'; 
            // Fichier contenant le cours sur les évènnements
            include 'event.php';
            // Fichier contenant le cours sur les manipulation des objets 
            include 'manipObjet.php';
            // Fichier contenant le cours sur l'ajout, la modification et la suppression de contenu
            include 'addModifyDelContent.php';
            // Fichier contenant la cours sur la gestion des formulaires
            include 'gestionForm.php';
            // Fichier contenant le cours sur les effets
            include 'effets.php';
            ?>

        </main>

        <footer>
            <div class="wrapperFooter">
                <div class="box1g">
                    <p>
                        Il existe aussi des "dérivés" de JQuery :
                        <ul>
                            <li>JQueryUI (pour User Interface) qui augmente les possibilités de gestion des interfaces.</li>
                            <li>JQuery Mobile pour le développement d'applications mobiles.</li>
                        </ul>
                    </p>
                </div>
            </div>
        </footer>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/prism.js"></script>
    <!-- <script src="assets/js/debug.js"></script> -->
</body>

</html>