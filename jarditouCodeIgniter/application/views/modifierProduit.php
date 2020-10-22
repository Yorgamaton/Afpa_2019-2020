<?php
$title = $produit->pro_libelle.' - Modification du produit';
?>

<?php ob_start(); ?>

<?php echo form_open_multipart(); ?> 
  <div class="form-group">
    <label for="formGroupExampleInput">ID</label>
    <input type="text" class="form-control" name="pro_id"id="pro_id" value="<?php  echo set_value('pro_id', $produit->pro_id); ?>" placeholder="" readonly>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Réference</label>
    <input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo set_value('pro_ref', $produit->pro_ref); ?>">
    <?php echo form_error('pro_ref');?>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Catégorie</label>
    <input type="text" class="form-control"name="pro_cat_id" id="pro_cat_id" value="<?php echo set_value('pro_cat_id', $produit->pro_cat_id); ?>">
    <?php echo form_error('pro_cat_id');?>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Libellé</label>
    <input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo set_value('pro_libelle', $produit->pro_libelle); ?>" placeholder="">
    <?php echo form_error('pro_libelle');?>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Description</label>
    <input type="text" class="form-control" name="pro_description" id="pro_description" value="<?php echo set_value('pro_description', $produit->pro_description); ?>" placeholder="">
    <?php echo form_error('pro_description');?>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Prix</label>
    <input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo set_value('pro_prix', $produit->pro_prix); ?>"placeholder="">
    <?php echo form_error('pro_prix');?>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Stock</label>
    <input type="text" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo set_value('pro_stock', $produit->pro_stock); ?>" placeholder="">
    <?php echo form_error('pro_stock');?>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Couleur</label>
    <input type="text" class="form-control" name="pro_couleur" id="couleur" value="<?php echo set_value('pro_couleur', $produit->pro_couleur); ?>"placeholder="">
    <?php echo form_error('pro_couleur');?>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Photo</label>
    <input type="file" name="pro_photo" id="pro_photo" class="form-control">
    <?php echo form_error('pro_photo');?>
  </div>

  <div class="form-group row">
    <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Produit bloqué : </label>
    <div class="col-lg-4 col-md-4">
      <?php 
      if ($produit->pro_bloque === "1"){
        echo '<div class="form-check form-check-inline">';
          echo '<input class="form-check-input" type="radio" name="pro_bloque" id="oui" value="1" checked>';
          echo '<label class="form-check-label" for="oui">oui</label>';
        echo '</div>';
        echo '<div class="form-check form-check-inline">';
          echo '<input class="form-check-input" type="radio" name="pro_bloque" id="non" value="0">';
          echo '<label class="form-check-label" for="non">non</label>';
        echo '</div>';
      }else{
        echo '<div class="form-check form-check-inline">';
          echo '<input class="form-check-input" type="radio" name="pro_bloque" id="oui" value="1">';
          echo '<label class="form-check-label" for="oui">oui</label>';
        echo '</div>';
        echo '<div class="form-check form-check-inline">';
          echo '<input class="form-check-input" type="radio" name="pro_bloque" id="non" value="0" checked>';
          echo '<label class="form-check-label" for="non">non</label>';
        echo '</div>';
      }
      ?>
    </div>
  </div>

  <button type="submit" class="btn btn-outline-success mb-2">Modifier</button>
  <button type="reset" class="btn btn-outline-danger mb-2">Refuser</button>
  <!-- Modal de suppression pour confirmation -->
  <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModalCenter">
    supprimer ce produit
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirmation de la suppression du produit : </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-3 d-flex justify-content-center align-items-center">
              <span class="text-danger"><i class="fas fa-exclamation-triangle fa-5x"></i></span>
            </div>
            <div class="col-9">
              <p class="mb-3">La suppression de ce produit sera définitive.</p>
              <p> êtes vous sûr de vouloir réaliser cette opération ?</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
          <!-- <input type="submit" class="btn btn-primary" value="Supprimer Produit"> -->
          <a href="<?= site_url("produits/supprimer/".$produit->pro_id); ?>" role="button" class="btn btn-danger">Supprimer</a>
        </div>
      </div>
    </div>
  </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>