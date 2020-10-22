<?php get_header(); ?>


<div class="row">
	<div class="col-8">
		<?php
		// =============== Les boucles ===============
		// https://codex.wordpress.org/fr:La_Boucle
		// https://codex.wordpress.org/fr:La_Boucle_En_Action
		// https://developer.wordpress.org/themes/basics/the-loop/


		if (have_posts()) : // S'il y a des articles 
			?>
			<div class="row">
			<?php
				while (have_posts()) : the_post(); ?> <!-- Tant qu'il y a des articles, alors pour chaque article on affiche : -->
					<!-- <?php the_post_thumbnail('medium'); ?> -->
					<!-- Permet d'insérer l'image. On met en premier paramètre la taille que l'on souhaite ('post-thumbnails' par défaut) 
					On pourrait également mettre 'thumdnail', 'medium' ou 'large', qui correspondent au réglage>média dans le tableau de bords
					puis les attributs ('post-thumbnails', ['class' => 'card-img-top', 'alt' => 'Image entête article']).  -->
					<div class="col-sm-6">
					<!-- the_title() affiche le titre de l'article -->
						<div class="card my-2">
							<?php
							if (has_post_thumbnail()) : // Vérifie qu'il existe une image mise en avant pour l'article
							?>
								<!-- image -->
								<?= the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => '']); ?>
								<!-- Card's text -->
								<?php
							endif; ?>
							<div class="card-body">
								<h5 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
								<h6 class="card-subtitle mb-2 text-muted">Publié le <strong><?php the_time('d F Y');/*the_date();*/ ?></strong> par <strong><?php the_author(); ?></strong><?php the_category(); ?></h6>
								<p class="card-text"><?= the_excerpt() ?></p>
								<a href="<?php the_permalink(); ?>" class="btn btn-primary">Voir plus</a>
							</div>
						</div>
					</div>
					<?php echo "<hr>";
				endwhile; ?>
			</div>

			<?php get_template_part('pagination'); ?>

		<?php else : ?>
			<h1>Pas d'article</h1>
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