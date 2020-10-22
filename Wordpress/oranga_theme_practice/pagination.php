<?php 

// Intégrer la pagination de bootstrap

    function oranga_pagination()
    {
        $pages = paginate_links(['type' => 'array']); // On va chercher l'ensemble des éléments de la navigation généré par WP
        if ($pages === null)
        {
            return;
        }
        echo '<nav aria-label="Pagination">';
            echo '<ul class="pagination mt-3">';
                foreach ($pages as $page) {
                    // On vient chercher ici la chaine current qui définit le lien comme actif dans WP (retourne false si current n'est pas trouvé)
                    $active = strpos($page, 'current') !== false; 
                    $class = "page-item";
                    if($active) // permet de définir le lien comme actif lorsque la variable $active retourne TRUE
                    {
                        $class .= ' active'; // On concatène alors page-item avec active qui permet de rendre le lien actif dans bootstrap
                    }
                    echo '<li class="'. $class .'">'; // ici on demande de concaténer avec la variable $class
                    echo str_replace('page-numbers', 'page-link', $page); // On va venir remplacer la class de WP par celle de Bootstrap
                    echo '</li>';
                }
            echo '</ul>';
        echo "</nav>";
    }
    oranga_pagination();