<?php
$title ='Jarditou - Produits';
?>

<?php ob_start(); ?>

    <!-- ******************************Produits********************************* -->
    <h1 id="ttlpage" class="text-center mb-3 mt-3">Produits</h1>
    <!--------------Tableau------------->
        <div class="row">

            <!-- boucle pour afficher tous les produits -->
            <?php foreach ($liste_produits as $row) { ?>

                <div class="col-lg-4 col-md-6 col-6 mb-2">
                    <div class="card">
                        <a href="<?= site_url('produits/detail/'.$row->pro_id)?>">
                            <img class="card-img-top p-4" src="<?= base_url("assets/img/".$row->pro_id.".".$row->pro_photo); ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="<?= site_url('produits/detail/'.$row->pro_id)?>"><strong class="text-dark"><?php echo $row->pro_libelle; ?></strong>
                                <small>(détails)</small>
                                </a> 
                            </h4>
                            <p class="card-text">
                                Réf : <?php echo $row->pro_ref; ?> - Couleur : <?php echo $row->pro_couleur; ?>
                            </p>
                        </div>
                        <div class="card-footer">
                        <!-- Pour afficher le bouton modifier pour le rôle admin -->
                            <?php 
                            if (isset($_SESSION["rank"]))
                            {
                                if ($_SESSION["rank"] == 1)
                                { ?>
                                        <small class="text-muted">
                                            <a href="<?= site_url('produits/modifier/'.$row->pro_id)?>">Modifier</a>
                                        </small>
                                        
                                <?php } 
                            } 
                            // Pour afficher l'ajout d'article
                            else 
                            { ?>
                                <div class='row'> 
                                    <div class="col-lg-6 col-12 text-center">
                                        <?= $row->pro_prix . "€"; ?>
                                    </div>
                                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                                        <?= form_open("panier/ajouterPanier"); ?>
                                            <!-- champ visible pour indiquer la quantité à commander -->
                                            <input type="number" class="form-control" name="pro_qte" id="pro_qte" value="1">
                                            <input type="hidden" name="pro_prix" id="pro_prix" value="<?= $row->pro_prix ?>">
                                            <input type="hidden" name="pro_id" id="pro_id" value="<?= $row->pro_id ?>">
                                            <input type="hidden" name="pro_libelle" id="pro_libelle" value="<?= $row->pro_libelle ?>">

                                            <!-- Bouton 'Ajouter au panier' -->
                                            <div class="form-group">
                                                <input type="submit" value="Ajouter au panier" class="btn btn-primary btn-sm mt-1">            
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            } ?>
                        </div>
                    </div>
                </div>

            <?php } ?> <!-- fin de la boucle -->
        </div>

        
        <!-- TODO: delete later -->
        <div id="accordion mb-1" id="accordionExample">
            <div class="card">
                <div class="row card-header" id="heading<?php echo $row->pro_id; ?>">
                    <h2 class="col-4 text-center">
                        <button class="txtDec btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $row->pro_id; ?>" aria-expanded="true" aria-controls="collapseOne">
                            <p><?php echo $row->pro_libelle; ?></p>
                        </button>
                    </h2>
                    <p class="prixTab col-4 text-center"><?php echo $row->pro_prix . "€"; ?></p>
                    <?php 
                        if (isset($_SESSION["rank"]))
                        {
                            if ($_SESSION["rank"] == 1)
                            { ?>
                                <div class="col-4 text-center">
                                    <a href="<?= site_url('produits/modifier/'.$row->pro_id)?>">Modifier</a>
                                </div>
                            <?php } 
                        } ?>
                </div>

                <div id="collapse<?php echo $row->pro_id; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="row card-body">
                        <ins class="ReducImg col-6">
                            <img class="img-thumbnail" src="<?= base_url("assets/img/".$row->pro_id.".".$row->pro_photo); ?>"alt="Grande Photo">
                        </ins>
                        <p class="col-5 offset-1">
                            <ins class="categTab row mb-3"><?php echo $row->pro_ref; ?></ins>
                            <ins class="prix2Tab row mb-3"><?php echo $row->pro_prix . "€"; ?></ins>
                            <ins class="refTab row">ID : <?php echo $row->pro_id; ?></ins>
                            <ins class="refTab row mb-4">Libellé : <?php echo $row->pro_libelle; ?></ins>
                            <ins class="refTab row">Ajouté : <?php echo $row->pro_d_ajout; ?></ins>
                            <ins class="refTab row">Modifié : <?php echo $row->pro_d_modif; ?></ins>
                            <ins class="refTab row">Bloqué : <?php echo $row->pro_bloque; ?></ins>
                            <ins class="descTab row">Description</ins>
                            <ins class="desc2Tab row"><?php echo $row->pro_description; ?></ins>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>