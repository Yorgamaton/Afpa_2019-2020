<?php
    include("php/header.php");    
    $db = connexionBase(); 
?>
<body>
    <a href="index.php"><i class="far fa-arrow-alt-circle-left fa-2x"></i>Retour vers les produits</a>
    <h2 class="text-center mt-3">Formulaire d'ajout de produit : </h2>

    <!-- Form -->
    <form action="produits_ajout_script.php" method="POST" enctype="multipart/form-data" class="mt-5">
        <div class="form-group row mt-2">
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Clé de la table produits : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_id" id="pro_id">
                <span id="error_pro_id"></span>
            </div>
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label">Catégorie du produit : </label>
                <div class="col-lg-3 col-md-4">
                    <select class="form-control" name="pro_cat" id="pro_cat">
                        <option>Sélectionnez la catégorie</option>
                        <?php
                        $requeteRef ='SELECT DISTINCT cat_nom, cat_id FROM categories LEFT JOIN produits ON cat_id = pro_cat_id';
                        $resultat = $db->query($requeteRef);
                        while($categorie=$resultat->fetch(PDO::FETCH_OBJ)){?>
                        <option value="<?=$categorie->cat_id?>"><?=$categorie->cat_id." - ".$categorie->cat_nom?></option>
                        <?php } ?>
                    </select>
                </div>
        </div>
        <div class="form-group row">
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Référence produit : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_ref" id="pro_ref">
                <span id="error_pro_ref"></span>
            </div>
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Nom du produit : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_libelle" id="pro_libelle">
                <span id="error_pro_libelle"></span>
            </div>
        </div>
        <div class="form-group row">
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Description du produit : *</label>
            <div class="col-lg-3 col-md-4">
                <textarea class="form-control" name="pro_description" id="pro_description" rows="4"></textarea>
                <span id="error_pro_description"></span>
            </div>
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Prix : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_prix" id="pro_prix">
                <span id="error_pro_prix"></span>
            </div>
        </div>
        <div class="form-group row">
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Nombre d'unité en stock : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_stock" id="pro_stock">
                <span id="error_pro_stock"></span>
            </div>
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Couleur : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="couleur" id="couleur">
                <span id="error_couleur"></span>
            </div>
        </div>
        <div class="form-group row">
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Extension de la photo : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="photo" id="photo" placeholder="Ex: jpg, png, ...">
                <span id="error_photo"></span>
            </div>
            <label for="fichier" class="col-lg-3 col-md-2 col-form-label ">Sélectionnez une photo : * </label>
            <div class="col-lg-3 col-md-4">
                <input type="file" class="form-control-file" name="fichier" id="fichier">        
            </div>
        </div>
        <div class="form-group row">
            <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Produit bloqué : </label>
            <div class="col-lg-4 col-md-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bloque" id="oui" value="1">
                    <label class="form-check-label" for="oui">oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bloque" id="non" value="0">
                    <label class="form-check-label" for="non">non</label>
                </div>
            </div>
        </div>
        <input type="hidden" id="pro_d_ajout" name="pro_d_ajout" value="<?php echo date('Y\-m\-d G:i:s'); ?>">
        <button type="submit" class="btn btn-success mb-2" name="submit" value="ajout d'un produit">Ajouter</button>
    </form>
</body>

<?php
    include("php/footer.php");    
?>