<?php
    include("php/header.php");    
?>

<!-- <h1>Exercice 3</h1>
<p>Affichage de la liste des enregistrements</p> -->
<?php
    $db = connexionBase(); // Appel de la fonction de connexion
    $requete = "SELECT pro_id, pro_description, pro_libelle, pro_prix, pro_stock, pro_photo  FROM produits ORDER BY pro_d_ajout DESC";
    $result = $db->query($requete);
    
    if (!$result) 
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2]; 
        die("Erreur dans la requête");
    }

    if ($result->rowCount() == 0) 
    {
        // Pas d'enregistrement
        die("La table est vide");
    }

if (is_admin() == true)
{
    echo '<a class="btn btn-secondary mb-1 mt-1" href="produits_ajout.php" role="button">Ajouter un produit</a>';
}
?>




    <div class="row mt-2">
        <?php while ($row = $result->fetch(PDO::FETCH_OBJ))
            { ?>
            <div class="col-3 mb-2">
                <div class="card products">
                    <a href="detail.php?pro_id=<?= $row->pro_id ?>" title="<?= $row->pro_libelle ?>">
                        <img class="card-img-top img-fluid rounded mx-auto d-block p-1" src="assets/img/<?= $row->pro_id ?>.<?= $row->pro_photo ?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="detail.php?pro_id=<?= $row->pro_id ?>" title="<?= $row->pro_libelle ?>"><?= $row->pro_libelle ?></a></h5>
                        <p class="card-text text-truncate" title="<?= $row->pro_description ?>" alt="<?= $row->pro_description ?>"> 
                            <?= $row->pro_description ?>
                        </p>
                    </div>
                    <div class="card-footer text-right">
                        <large><?= $row->pro_prix." €<br>" ?></large>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php
    include("php/footer.php");    
?>
