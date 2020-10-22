<?php

namespace App; // Permet d'éviter les conflits lors de l'appel de fonction
// =============== Hooks ===============

    // =============== actions ===============
    // https://codex.wordpress.org/Plugin_API/Action_Reference

    add_action('after_setup_theme', 'App\oranga_supports'); //after_setup_theme est un hook qui permet d'appeler les actions avec le chargement du thème.
    add_action('wp_enqueue_scripts', 'App\oranga_resgister_assets'); // wp_enqueue_scripts est un hook : ça se lance quand les scripts et les styles sont mis en attente

    // =============== filtres ===============
    // https://codex.wordpress.org/Plugin_API/Filter_Reference
    add_filter('document_title_separator', 'App\oranga_title_separator'); // document_title_separator est l'élément que l'on va venir altérer. Ici c'est pour modifier le séparateur
    add_filter('get_the_excerpt', 'App\excerpt_display_strong'); // get_the_excerpt est l'élément que l'on va alterer. Permet de récupérer les extraits.


// =============== functions ===============

    // Les actions

        // Fonction qui permet de gérer les prises en charge pour le thème
        function oranga_supports()
        {
            add_theme_support('title-tag'); //permet de définir le title de la page en fonction de la page sur laquelle on se trouvve.
            // A noter qu'il existe d'autres paramètre possible : https://developer.wordpress.org/reference/functions/add_theme_support/ 
            add_theme_support('post-thumbnails'); // permet de supporter les images de mises en avant.

            // Gérer les paramètres du logo
            // https://developer.wordpress.org/themes/functionality/custom-logo/
            $aParams = array(
                'height'      => 100,
                'width'       => 400,
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => array( 'site-title', 'site-description' ),
            );

            // Ajoute la possibilité de gérer les logos 
            add_theme_support('custom-logo', $aParams );

            // Ajoute la prise en charge des menus
            add_theme_support('menus'); 

            // Ajoute la prise en charge des zones de menus
            register_nav_menus( // pour ajouter plusieurs menus (sinon "register_nav_menu()")
                array(
                    'principal' => __( 'Menu principal' ),
                    'footer' => __( 'menu footer' )
                ) 
            );
            
            // Permet d'ajouter la class bootstrap pour affichier les menus
            // https://wabeo.fr/construire-walker-wordpress/
            require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

            // Pour défnir un format d'image pour une card bootstrap
            add_image_size('card-header', 350, 215, true);

            // On peut modifier les formats d'image originaux de WP
            remove_image_size('medium');
            add_image_size('medium, 301, 301');
        }

        // Fonction qui permet de charger bootstrap
        function oranga_resgister_assets()
        {
            wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'); // Fonction qui permet d'enregistrer les styles
            
            /**
             *  A la fin, entre les crochets, on utilise ce qu'on appelle le système de dépendance, 
             * c'est à dire que lorsuqe j'enregistre le script bootstrap fonction, pour pouvoir fonctionner, 
             * il lui faudra également le script popper et jquery 
             * false = pas de version
             * true = signifie qu'il faut le placer dans le footer
             * */ 
            wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', ['jquery', 'popper'], false, true); 
            wp_deregister_script('jquery'); /* permet de ne plus appeler les jquery propre à wordpress dans le cas présent. 
            // Faire attention car désactiver le jquery de wordpress peut amener des erreurs de compatibilité lors d'utilisation de plugin. 
            Mettre peut être à la place un 'jquerymin' en paramètre */
            wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', [], false, true);
            wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], false, true);
            wp_enqueue_style('bootstrap'); //permet de mettre dans la fils d'attente l'enregistrement du style
            wp_enqueue_script('bootstrap'); //permet de mettre dans la fils d'attente l'enregistrement du script. On ne charge que bootstrap puisque les deux autres y sont liés.
        }

    // Les filtres

        // Cette fonction permet d'écrire l'extrait des posts en italique
        function excerpt_display_strong($texte) 
        {
            return "<i>".$texte."</i>";
        }  
        
        // cette fonction permet de changer le separateur qu'il y a au niveau du titre de la page (Par défaut c'est le tiret : "-") 
        function oranga_title_separator()
        {
            return '|';
        }


