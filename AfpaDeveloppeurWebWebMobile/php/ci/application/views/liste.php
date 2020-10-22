<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>"> 
	<title>Liste des produits</title>
</head>
<body>
	<div class="container">
		<div class="card mb-3">
			<img class="card-img-top" src="codeigniter.jpg" alt="Card image cap">
			<div class="card-body text-center">
				<h5 class="card-title"><h1><b>CodeIgniter 3.0</b></h1></h5>
			</div>
        </div>
        
        <h1>Phase 2.1: Démarrage</h1>

        <h3>Exercice 1 :</h3>
        <p>Bonjour <?php echo $prenom." ".$nom; ?> !</p>

        <h3>Exercice 2 : Liste des produits</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom du produit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($produits as $produit):?>
                    <tr>
                        <td><?php echo $produit;?></td>
                    </tr>
                <?php endforeach;?>                
            </tbody>
        </table>

        <h3>Phase 2.2 : Les Urls</h3>
        <div class="alert alert-success" role="alert">
		Lien qui permet de changer d'URL : Voyagez vers <a href="<?= site_url(); ?>">l'inconnu !</a> <font size="-3"><strike >(Vous n'irez pas bien loin !)</strike> </font> 
        </div>

        <h3>Phase 2.3 : Les bases de données</h3>
        
        <div class="row">
            <div class="col-12" style="height: 300px; overflow: auto;"> 
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Référence</th>
                            <th>Libellé</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($liste_produits as $row) 
                            {
                                echo "<tr>";
                                    echo"<td>".$row->pro_id."</td>";
                                    echo"<td>".$row->pro_ref."</td>";
                                    echo"<td>".$row->pro_libelle."</td>";
                                    echo"<td>".$row->pro_description."</td>";
                                echo "<tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="alert alert-success" role="alert">
        Prêt à retenter une voyage ? <a href="<?= site_url('produits/ajouter'); ?>" class="text-dark"><b><h4> ZZZÉÉéééééé PARRTTTIIIIIIIiiiiiiiiiiiiiii !!!</h4></b></a> 
        </div>
        
	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>>
	
