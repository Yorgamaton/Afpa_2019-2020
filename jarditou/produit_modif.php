<?php
    include("php/header.php");    
?>    
<?php     
    $db = connexionBase(); // Appel de la fonction de connexion
    $pro_id = $_GET["pro_id"];
    $pro_cat_id = $_GET["pro_cat_id"];
    $requete = "SELECT pro_id, pro_cat_id, pro_libelle, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_photo, pro_couleur, pro_bloque, pro_d_ajout, pro_d_modif  FROM produits WHERE pro_id=".$pro_id;
    $result = $db->query($requete);
    // Renvoi de l'enregistrement sous forme d'un objet
    $produit = $result->fetch(PDO::FETCH_OBJ);
?>


<body>
<a href="detail.php?pro_id=<?php echo $produit->pro_id;?>"><i class="far fa-arrow-alt-circle-left fa-2x"></i>Retour vers le détail du produit</a>
    <form action="produit_modif_script.php" method="POST" enctype="multipart/form-data">
        <fieldset>
        <legend class="text-center mt-2"><h2>Formulaire de modification :</h2></legend>
            <div class="form-group row mt-2">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Clé de la table produits : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_id" id="pro_id" value="<?php echo $produit->pro_id; ?> " >
                    <span id="error_pro_id"></span>
                </div>
                <!-- <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Catégorie du produit : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_cat" id="pro_cat" value="<?php echo $produit->pro_cat_id; ?>" >
                    <span id="error_pro_cat"></span>
                </div>
                 -->
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label">Catégorie du produit : </label>
                <div class="col-lg-3 col-md-4">
                    <select class="form-control" name="pro_cat" id="pro_cat">
                        <?php
                        $requeteRef ='SELECT DISTINCT cat_nom, cat_id FROM categories LEFT JOIN produits ON cat_id = pro_cat_id';
                        $resultat = $db->query($requeteRef);
                        while($categorie=$resultat->fetch(PDO::FETCH_OBJ)){ ?>
                            <?php 
                            IF ($categorie->cat_id == $pro_cat_id) { ?>
                                <option value="<?=$categorie->cat_id?>" selected><?=$categorie->cat_id." - ".$categorie->cat_nom?></option>
                            <?php } else
                                { ?>
                                <option value="<?=$categorie->cat_id?>"><?=$categorie->cat_id." - ".$categorie->cat_nom?></option>
                            <?php } }?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Référence produit : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_ref" id="pro_ref" value=" <?php echo $produit->pro_ref; ?>" >
                    <span id="error_pro_ref"></span>
                </div>
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Nom du produit : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo $produit->pro_libelle; ?>" >
                    <span id="error_pro_libelle"></span>
                </div>
            </div>
            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Description du produit : </label>
                <div class="col-lg-3 col-md-4">
                    <textarea class="form-control" name="pro_description" id="pro_description" rows="4" ><?php echo $produit->pro_description; ?></textarea>
                    <span id="error_pro_description"></span>
                </div>
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Prix : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo $produit->pro_prix; ?>" >
                    <span id="error_pro_prix"></span>
                </div>
            </div>
            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Nombre d'unité en stock : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo $produit->pro_stock; ?>" >
                    <span id="error_pro_stock"></span>
                </div>
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Couleur : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="couleur" id="couleur"
                    value="<?php echo $produit->pro_couleur; ?>" >
                    <span id="error_couleur"></span>
                </div>
            </div>
            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Extension de la photo : </label>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control" name="photo" id="photo"
                        value="<?php echo $produit->pro_photo; ?>" >
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
                    <?php 
                        if ($produit->pro_bloque === "1"){
                            echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bloque" id="oui" value="1" checked>';
                                echo '<label class="form-check-label" for="oui">oui</label>';
                            echo '</div>';
                            echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bloque" id="non" value="0">';
                                echo '<label class="form-check-label" for="non">non</label>';
                            echo '</div>';
                        }else{
                            echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bloque" id="oui" value="1">';
                                echo '<label class="form-check-label" for="oui">oui</label>';
                            echo '</div>';
                            echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bloque" id="non" value="0" checked>';
                                echo '<label class="form-check-label" for="non">non</label>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
            <p>date d'ajout : <?php echo $produit->pro_d_ajout; ?></p>
            <input type="hidden" id="date_ajout" name="date_ajout" value="<?php echo $produit->pro_d_ajout; ?>">
            <p>date de modification : <?php echo date('Y\-m\-d'); ?></p>
            <input type="hidden" id="date_modif" name="date_modif" value="<?php echo date('Y\-m\-d G:i:s'); ?>">
            <!-- TODO: Changer le bouton en submit -->
            <button type="submit" class="btn btn-warning mb-2" name="modifier" value="modification du produit">Modifier</button>
        </fieldset>
    </form>
</body>

<?php
    include("php/footer.php");    
?>