<?php get_header(); ?>

<div class="row">
    <div class="col-8">
        <?php
        if (have_posts()) : the_post();
            if (has_post_thumbnail()) : // Vérifie qu'il existe une image mise en avant pour l'article
            ?>
                <!-- image
                // the_post_thumbnail('medium');
                // OU -->
                <img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:100%; height:auto;"> <!-- permet de récupérer le lien de l'image -->
                
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
            <hr>
            Publié le <strong><?php the_date(); ?></strong> par <strong><?php the_author(); ?></strong>
            <hr>
            <div><?php the_content(); ?></div>
        <?php
        endif;
        ?>
    </div>
    <!-- sidebar.php -->
    <div class="col-4 border border-dark">
        [ SIDEBAR ]
    </div>
</div>


<?php get_footer(); ?>