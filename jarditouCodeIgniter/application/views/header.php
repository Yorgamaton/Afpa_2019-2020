<header>
  <!-- Affichage de la date et de l'heure -->
  <!-- <div class="row">
    <div class="col text-center">
      <?php
        echo "Nous sommes le  ".strftime('%A %#d %B %Y'); // Affiche la date du jour
        echo ". Il est " . date("H:i:s") ; // Affiche l'heure
        echo " "
      ?>
    </div>
  </div> -->

  <!-- Logo and Title -->
  <div class="row d-flex justify-content-center">
    <!-- LOGO -->
    <div class="col-lg-4 col-md-4 col-sm-6">
      <a href="<?= site_url('produits/liste'); ?>"><img src="<?= base_url('assets/img/jarditou_logo.jpg'); ?>" class="m-2" id="logo"
              alt="Logo du site : Une femme tenant une brouette" title="Logo du site Jarditou"></a>
    </div> 


    <!-- Title -->
    <!-- <div class="col-lg-8 col-md-8 col-sm-6 d-flex align-items-center justify-content-center">
      <h4 class="display-8">La qualité depuis 70 ans</h4>
    </div> -->
  </div>

  <!-- NAV BAR -->
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">

    <div class="col-8">
    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/brand.png'); ?>" 
                  alt="Dessin d'une fleur jaune dans un pot" title="Petite fleur"></a>
        <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link text-white" href="<?= site_url(); ?>" title= "Accueil">Accueil<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white" href="<?= site_url('produits/liste'); ?>">Produits</a>
          </li>
          <!-- TODO: gérer le formulaire de contact -->
          <!-- <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
          </li> -->

          <?php
          if (isset($_SESSION["rank"]))
          { 
            if ($_SESSION["rank"] == 1)
            { ?>
              <li class="nav-item">
                  <a class="nav-link text-white" href="gestion_admin.php">gestion</a>
              </li>
              <li class="nav-item">
              <a class="nav-link text-white" href="<?= site_url('produits/ajouter'); ?>">Ajouter un produit</a>
              </li>
              <?php 
            } 
          }?>
        </ul>
      </div>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <?php
      if(isset($_SESSION['username'])) 
      {
          echo "<p class='text-secondary text-light'>Welcome, ".$_SESSION['username']."</p>";
      }

      if (isset($_SESSION["rank"]))
      { 
          if ($_SESSION["rank"] == 0)
          { ?>  <!-- je defini les pages que l'utilisateur peut voir selon son role dans la base de données -->
              
              <?php 
          } 
          else if ($_SESSION["rank"] == 1)
          { ?>
              
              <?php 
          } ?>
            <a class="nav-link text-white text-light" href="<?= site_url('users/deconnexion'); ?>"><i class="fas fa-power-off fa-2x"></i></a>
          <?php
      }
      else
      {?>
        <a class="nav-link text-white" href="<?= site_url('users/index'); ?>"><i class="far fa-user fa-2x"></i></a>
        <a href="<?= site_url('panier/afficherPanier');?>" class="text-white"> <i class="fas fa-shopping-cart fa-2x"></i></a>
      <?php 
      } ?>

    </div>
  </nav>
  <img src="<?= base_url('assets/img/promotion.jpg'); ?>" class="img-fluid mt-2 border border-dark rounded">
  
</header>
