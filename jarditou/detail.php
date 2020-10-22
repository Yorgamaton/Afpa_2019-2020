<?php
    include("php/header.php");    
?>
<?php     
    $db = connexionBase(); // Appel de la fonction de connexion
    $pro_id = $_GET["pro_id"];
    $requete = "SELECT pro_id, pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_d_modif, pro_bloque FROM produits WHERE pro_id=".$pro_id;
    $result = $db->query($requete);
    // Renvoi de l'enregistrement sous forme d'un objet
    $produit = $result->fetch(PDO::FETCH_OBJ);
?>

<body>
    <!-- TODO: Mettre des breadcrumb à la place des liens en commençant à partir de la liste des produits? -->
    <a href="index.php"><i class="far fa-arrow-alt-circle-left fa-2x"></i>Retour vers les produits</a>
    <form action="produit_supprimer_script.php" method="POST">
        <fieldset>
            <legend class="text-center mt-2">
                <h2>Détails du produit :</h2>
            </legend>
            <div class="form-group row mt-2">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Clé de la table produits : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_id" id="pro_id"
                        value="<?php echo $produit->pro_id; ?> " readonly>
                    <span id="error_pro_id"></span>
                </div>
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Catégorie du produit : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_cat" id="pro_cat"
                        value="<?php echo $produit->pro_cat_id; ?>" readonly>
                    <span id="error_pro_cat"></span>
                </div>
            </div>
            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Référence produit : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_ref" id="pro_ref"
                        value=" <?php echo $produit->pro_ref; ?>" readonly>
                    <span id="error_pro_ref"></span>
                </div>
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Nom du produit : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_libelle" id="pro_libelle"
                        value="<?php echo $produit->pro_libelle; ?>" readonly>
                    <span id="error_pro_libelle"></span>
                </div>
            </div>
            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Description du produit : </label>
                <div class="col-lg-3 col-md-4">
                    <textarea class="form-control" name="pro_description" id="pro_description" rows="4"
                        readonly><?php echo $produit->pro_description; ?></textarea>
                    <span id="error_pro_description"></span>
                </div>
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Prix : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_prix" id="pro_prix"
                        value="<?php echo $produit->pro_prix; ?>" readonly>
                    <span id="error_pro_prix"></span>
                </div>
            </div>
            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Nombre d'unité en stock : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_stock" id="pro_stock"
                        value="<?php echo $produit->pro_stock; ?>" readonly>
                    <span id="error_pro_stock"></span>
                </div>
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Couleur : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="couleur" id="couleur"
                        value="<?php echo $produit->pro_couleur; ?>" readonly>
                    <span id="error_couleur"></span>
                </div>
            </div>
            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Extension de la photo : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="photo" id="photo"
                        value="<?php echo $produit->pro_photo; ?>" readonly>
                    <span id="error_photo"></span>
                </div>
            </div>

            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Produit bloqué : </label>
                <div class="col-lg-4 col-md-4">
                    <?php 
                        if ($produit->pro_bloque === "1"){
                            echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bloque" id="oui" value="1" checked disabled>';
                                echo '<label class="form-check-label" for="oui">oui</label>';
                            echo '</div>';
                            echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bloque" id="non" value="0" disabled>';
                                echo '<label class="form-check-label" for="non">non</label>';
                            echo '</div>';
                        }else{
                            echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bloque" id="oui" value="1" disabled>';
                                echo '<label class="form-check-label" for="oui">oui</label>';
                            echo '</div>';
                            echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bloque" id="non" value="0" checked disabled>';
                                echo '<label class="form-check-label" for="non">non</label>';
                            echo '</div>';
                        }
                        ?>
                </div>
            </div>
            <p>date d'ajout : <?php echo $produit->pro_d_ajout; ?></p>
            <p>date de modification : <?php echo $produit->pro_d_modif; ?></p>
            
            <?php
            if (is_admin() == true)
            { ?>
                <a class="btn btn-warning mb-2" href="produit_modif.php?pro_id=<?php echo $produit->pro_id;?>&pro_cat_id=<?php echo $produit->pro_cat_id;?>"
                    role="button">Modifier</a>
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModalCenter">
                Supprimer
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer ce produit ?
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-success mb-2" href="index.php"
                        role="button">Annuler</a>
                            <button type="submit" class="btn btn-danger mb-2" name="supprimer" value="supression du produit">Supprimer le produit</button>
                        </div>
                        </div>
                    </div>
                </div>
            <?php } ?>



        </fieldset>
    </form>
</body>

<?php
    include("php/footer.php");    
?>