<?php
$title = 'Jarditou : ' .$produit->pro_libelle;
?>

<?php ob_start(); ?>

<div class="row bg-light m-1 border">

  <!-- Informations produits -->
  <div class="row"> 
    <div class="col ml-3 mt-2">
      <h4><strong><?php echo $produit->pro_libelle; ?></strong></h4> 
      <p>Réf : <?php echo $produit->pro_ref; ?> - Couleur : <?php echo $produit->pro_couleur; ?></p> 
    </div>
  </div> <!-- fin informations produits -->

  <!-- Image et prix/panier/description -->
  <div class="row">

    <!-- Colonne de gauche : Image -->
    <div class="col-6">
      <img class="img-thumbnail ml-3 mb-3" src="<?= base_url("assets/img/" . $produit->pro_id . "." . $produit->pro_photo); ?>" alt="Grande Photo">
    </div> <!-- fin colonne de gauche -->

    <!-- colonne de droite Prix, ajout panier, description -->
    <div class="col-6">
      <div class="row">
        <div class="col-4">
          <!-- Affichage du prix -->
          Prix : <?php echo $produit->pro_prix . "€"; ?>
        </div>

        <!-- Input/panier -->
        <div class="col-4">
          <?= form_open("panier/ajouterPanier"); ?>
            <!-- champ visible pour indiquer la quantité à commander -->
            <input type="number" class="form-control" name="pro_qte" id="pro_qte" value="1">
            <input type="hidden" name="pro_prix" id="pro_prix" value="<?= $produit->pro_prix ?>">
            <input type="hidden" name="pro_id" id="pro_id" value="<?= $produit->pro_id ?>">
            <input type="hidden" name="pro_libelle" id="pro_libelle" value="<?= $produit->pro_libelle ?>">
            
            <!-- Bouton 'Ajouter au panier' -->
            <div class="form-group">
              <input type="submit" value="Ajouter au panier" class="btn btn-primary btn-sm mt-1">
            </div>
          </form>
        </div><!-- Fin input/panier -->
      </div> <!-- fin row -->

      <!-- Description du produit -->
      <p class="text-justify mr-4"><strong>Description : </strong><?php echo $produit->pro_description; ?></p>

    </div> <!-- fin colonne de droite Prix, ajout panier, description -->
    
  </div> <!-- Fin image et prix/panier/description -->
</div><!-- div.row -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>