<!-- nav bar -->
<nav id="navbar" class="navbar navbar-expand-lg bg-dark navbar-dark my-3">
    <!-- Affichage du logo -->
    <?php
    $custom_logo_id = get_theme_mod('custom_logo');

    $aLogo = wp_get_attachment_image_src($custom_logo_id, 'medium');

    if (has_custom_logo()) { // Si un logo a été défini
        echo '<a href="' . get_bloginfo('url') . '" title="' . get_bloginfo('name') . '" class="navbar-brand"><img src="' . esc_url($aLogo[0]) . '" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '" class="img-fluid"></a>';
    } else {   // Sinon on affiche le nom du site
        echo '<h1>' . get_bloginfo('name') . '</h1>';
    }
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <?php
        if (function_exists('wp_nav_menu')) { // permet d'être compatible avec des versions plus anciennenes de wordpress
            if (has_nav_menu('principal')) { // permet d'afficher un message si un menu spécifique n'a pas été créé
                wp_nav_menu( //permet d'afficher le menu mis en paramètre
                    array(
                        'theme_location'    => 'principal',
                        'depth'             => 5,
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker()
                    )
                );
            } else {
                echo "Le menu n'est pas configuré.";
            }
        } else {
            wp_list_pages('title_li='); // permet d'afficher les pages du site à l'endroit du menu si aucun menu n'a été créé
        }
        ?>
        <div class="col">

            <?php get_search_form(); ?> 
        </div>
    </div>
</nav>

