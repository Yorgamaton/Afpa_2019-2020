<?php
include 'header.php';
include 'connexion_bdd.php';
$oPdo = connexionBase();
?>

<h3>1. v_GlobalCde correspondant à la requête : </h3> 
<p>
    A partir de la table Ligcom, afficher par code produit, la somme des quantités commandées et le prix total correspondant : 
    on nommera la colonne correspondant à  la somme des quantités commandées, QteTot et le prix total, PrixTot.
</p>
    <?php
    $aHotels = $oPdo->query("SELECT * FROM `v_globalcde`");
    ?>
    <table class="table table-responsive">
        <tr>
            <th>Code produit</th>
            <th>Quantité Commandée</th>
            <th>Prix total</th>
        </tr>
        <?php
            // Affichage du contenu avec une boucle
            while ($o=$aHotels->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "<tr>";
                    echo"<td> ".$o['code produit']."</td>";
                    echo"<td> ".$o['QteTot']."</td>";
                    echo"<td> ".$o['PrixTot']."</td>";
                echo "</tr>";
            }
            ?>
    <table>

<h3>2. v_VentesI100 correspondant à la requête :</h3> 
<p>
    Afficher les ventes dont le code produit est le I100 (affichage de toutes les colonnes de la table Vente). 
</p>
    <?php
    $aHotels = $oPdo->query("SELECT * FROM `v_ventesi100`");
    ?>
    <table class="table table-responsive">
        <tr>
            <th>Code produit</th>
            <th>numéro du fornisseur</th>
            <th>Délai de livraison</th>
            <th>Quantité 1</th>
            <th>Prix 1</th>
            <th>Quantité 2</th>
            <th>Prix 2</th>
            <th>Quantité 3</th>
            <th>Prix 3</th>
        </tr>
        <?php
            // Affichage du contenu avec une boucle
            while ($o=$aHotels->fetch(PDO::FETCH_OBJ)) 
            {
                echo "<tr>";
                    echo"<td> ".$o->codart."</td>";
                    echo"<td> ".$o->numfou."</td>";
                    echo"<td> ".$o->delliv."</td>";
                    echo"<td> ".$o->qte1."</td>";
                    echo"<td> ".$o->prix1."</td>";
                    echo"<td> ".$o->qte2."</td>";
                    echo"<td> ".$o->prix2."</td>";
                    echo"<td> ".$o->qte3."</td>";
                    echo"<td> ".$o->prix3."</td>";
                echo "</tr>";
            }
            ?>
    <table>

<h3>3. A partir de la vue précédente :</h3> 
<p>
    Créez v_VentesI100Grobrigan remontant toutes les ventes concernant le produit I100 et le fournisseur 00120.
</p>
    <?php
    $aHotels = $oPdo->query("SELECT * FROM `v_ventesi100grobrigan`");
    ?>
    <table class="table">
        <tr>
            <th>Code produit</th>
            <th>numéro du fornisseur</th>
            <th>Délai de livraison</th>
            <th>Quantité 1</th>
            <th>Prix 1</th>
            <th>Quantité 2</th>
            <th>Prix 2</th>
            <th>Quantité 3</th>
            <th>Prix 3</th>
        </tr>
        <?php
            // Affichage du contenu avec une boucle
            while ($o=$aHotels->fetch(PDO::FETCH_OBJ)) 
            {
                echo "<tr>";
                    echo"<td> ".$o->codart."</td>";
                    echo"<td> ".$o->numfou."</td>";
                    echo"<td> ".$o->delliv."</td>";
                    echo"<td> ".$o->qte1."</td>";
                    echo"<td> ".$o->prix1."</td>";
                    echo"<td> ".$o->qte2."</td>";
                    echo"<td> ".$o->prix2."</td>";
                    echo"<td> ".$o->qte3."</td>";
                    echo"<td> ".$o->prix3."</td>";
                echo "</tr>";
            }
            ?>
    <table>


<?php
include 'footer.php';
