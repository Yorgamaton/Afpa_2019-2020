<?php
$title ='Village Green : Accueil';
?>

<?php ob_start(); ?>

<div class="row ml-4 mt-4 mb-3">
	<div class="col-9">
		<img src="<?= base_url('assets/images/body/pub_guitare.png'); ?>" id="pubGuitare" class="img-fluid h-100" alt="">
		<a href="">
			<img src="<?= base_url('assets/images/body/pub_guitare_bouton_blanc.png'); ?>" id="enSavoirPlus" alt="">
		</a>
	</div>
	<div class="col-3 text-center">
		<a href="">
			<img src="<?= base_url('assets/images/body/banniere_droite_prix.png'); ?>" class="img-fluid" alt="">
		</a>
	</div>
</div>

<div class="row">
	<div class="col picto mt-4 p-0">
		<img src="<?= base_url('assets/images/body/banniere_centre_4_pictos.png'); ?>" class="img-fluid" alt="">
	</div>
</div>

<!-- catégories -->
<h2 class="font-weight-bold mt-4 m-3 ml-4">Nos catégories</h2>
<div class="row" id="rowCategories">
	<div class="col-3 categories" >
		<a href="">
			<img src="<?= base_url('assets/images/body/categories_guitare.png'); ?>" id="categories_guitare" class="img-fluid h-100" alt="">
		</a>
	</div>
	<div class="col-3 categories">
		<a href="">
			<img src="<?= base_url('assets/images/body/categories_batterie.png'); ?>" id="categories_batterie" class="img-fluid h-100" alt="">
		</a>
	</div>
	<div class="col-3 categories">
		<a href="">
			<img src="<?= base_url('assets/images/body/categories_piano.png'); ?>" id="categories_piano" class="img-fluid h-100" alt="">
		</a>
	</div>
	<div class="col-3 categories">
		<a href="">
			<img src="<?= base_url('assets/images/body/categories_micro.png'); ?>" id="categories_micro" class="img-fluid h-100" alt="">
		</a>
	</div>
	<div class="col-3 categories">
		<a href="">
			<img src="<?= base_url('assets/images/body/categories_sono.png'); ?>" id="categories_sono" class="img-fluid h-100" alt="">
		</a>
	</div>
	<div class="col-3 categories">
		<a href="">
			<img src="<?= base_url('assets/images/body/categories_cases.png'); ?>" id="categories_cases" class="img-fluid h-100" alt="">
		</a>
	</div>
	<div class="col-3 categories">
		<a href="">
			<img src="<?= base_url('assets/images/body/categories_access.png'); ?>" id="categories_access" class="img-fluid h-100" alt="">
		</a>
	</div>
	<div class="col-3 categories">
		<a href="">
			<img src="<?= base_url('assets/images/body/categories_saxo.png'); ?>" id="categories_saxo" class="img-fluid h-100" alt="">
		</a>
	</div>
</div>

<!-- meilleurs ventes / partenaire -->
<div class="row ml-0 mt-2 p-4 pr-0">
	<div class="col-6 pr-4">
		<h2 class="font-weight-bold mb-3">Nos meilleures ventes</h2>
		<div class="row">
			<div class="col-4 pr-0">
				<a href="">
					<img src="<?= base_url('assets/images/body/top_ventes_guitare.png'); ?>" id="topVente_guitare" class="img-fluid top_vente_img"
					alt="">
				</a>
				
			</div>
			<div class="col-4 pr-0">
				<a href="">
					<img src="<?= base_url('assets/images/body/top_ventes_saxo.png'); ?>" id="topVente_saxo" class="img-fluid top_vente_img"
					alt="">
				</a>
			</div>
			<div class="col-4 pr-0">
				<a href="">
					<img src="<?= base_url('assets/images/body/top_ventes_piano.png'); ?>" id="topVente_piano" class="img-fluid top_vente_img"
					alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="col-6 pr-0 pl-4">
		<h2 class="font-weight-bold mb-3">Nos partenaires</h2>
		<img src="<?= base_url('assets/images/body/partenaires_4_logos.png'); ?>" class="img-fluid" alt="">
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
