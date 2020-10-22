<!-- Les headers -->
<!-- https://www.seomix.fr/get-template-part-include-functions/ -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- <title><?php echo get_bloginfo('title'); ?></title>    -->
    <!-- Je modifie le titre pour chaque page dans le fichier functions.php -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><meta name='robots' content='noindex,follow' /> -->
    <!-- Je charge bootstrap dans le fichier functions.php -->
    <?php wp_head(); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Affichage du logo
                <?php
                // $custom_logo_id = get_theme_mod('custom_logo');

                // $aLogo = wp_get_attachment_image_src($custom_logo_id, 'medium');

                // if (has_custom_logo()) { // Si un logo a été défini
                //     echo '<a href="' . get_bloginfo('url') . '" title="' . get_bloginfo('name') . '"><img src="' . esc_url($aLogo[0]) . '" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '" class="img-fluid"></a>';
                // } else {   // Sinon on affiche le nom du site
                //     echo '<h1>' . get_bloginfo('name') . '</h1>';
                // }
                ?> -->

                <!-- Permet d'afficher des parties communes aux différents templates en passant en argument le nom du fichier php sans l'extension -->
                <?php get_template_part('part_nav'); ?> 
                
            </div> <!-- .col -->
        </div> <!-- .row -->