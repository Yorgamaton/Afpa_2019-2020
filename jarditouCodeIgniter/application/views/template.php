<?php 
date_default_timezone_set("Europe/Paris"); // permet de régler le fuseau horaire
setlocale(LC_TIME, "fra.UTF-8", "fr_FR"); //permet d'afficher la date sous le format que l'on choisit : ici France
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Jarditou propose des articles de jardinage en ligne">
        <meta name="robots" content="index, follow">

        <!-- link -->
        <link rel="canonical" href="https://dev.amorce.org/rframery/jarditouCodeIgniter/index.php/produits/liste" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">

        <!-- title à définir dans la view -->
        <title><?= $title ?></title>
    </head>

    <body>
        
        <div class="container">
        <?php require('header.php');?>
        <!-- content à définir dans la vue -->
            <?= $content ?>
        <?php require('footer.php');?>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>