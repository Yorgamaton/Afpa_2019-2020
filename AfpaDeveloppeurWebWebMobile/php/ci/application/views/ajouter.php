<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>"> 
	<title>Ajout de produits</title>
</head>
<body>
	<div class="container">
        <h3>phase 2.4 : Les formulaires</h3>
        <!-- <?php echo validation_errors(); ?> 
        validation_errors() will return any error messages sent back by the validator. If there are no messages it returns an empty string. -->

        <?php echo form_open(); ?> 
        <!-- <form action="http://localhost/ci/index.php/produits/ajouter" method="post">
        la même méthode sera utilisée pour afficher et traiter le formulaire 
        elle initialise aussi des mécanismes de sécurité contre les failles XSS et CSRF -->

            <div class="form-group">
                <label for="pro_cat_id">Catégorie du produit</label>
                <input type="text" name="pro_cat_id" id="pro_cat_id" class="form-control" value="<?php echo set_value('pro_cat_id'); ?>">
                <?php echo form_error('pro_cat_id'); ?>
            </div>

            <div class="form-group">
                <label for="pro_libelle">Libellé</label>
                <input type="text" name="pro_libelle" id="pro_libelle" class="form-control" value="<?php echo set_value('pro_libelle'); ?>">
                <?php echo form_error('pro_libelle'); ?>
            </div>


            <div class="form-group">
                <label for="pro_ref">Référence</label>
                <input type="text" name="pro_ref" id="pro_ref" class="form-control" value="<?php echo set_value('pro_ref'); ?>">
                <!-- la méthode set_value() permet de garder la valeur rentré lors du rechargement de la page même si elle n'est pas juste -->
                <?php echo form_error('pro_ref'); ?>
            </div>

            <button type="submit" class="btn btn-dark">Ajouter</button>
        </form>

        
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

