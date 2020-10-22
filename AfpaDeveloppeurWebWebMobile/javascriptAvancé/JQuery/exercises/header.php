<?php    
session_start();
date_default_timezone_set("Europe/Paris");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <title>Formulaire de contact</title>
</head>

<body class="bg-white">
    <div class="container">
        <!-- <header>
        </header> -->

        <nav id="navbar" class="navbar navbar-expand-sm bg-white navbar-light">
            <div class="col-4">
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">A propos</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <!-- Just an image -->
                <a class="navbar-brand" href="#">
                    <img src="assets/images/jarditou_logo2.png" width="100%" height="50"
                        alt="Logo du site : Une femme tenant une brouette" title="Logo du site Jarditou">
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end">

                <?php 
                // if (is_logged()){ 
                ?>
                    <!-- <p class="mt-3">Bonjour <?= $_SESSION['username']?> !</p>
                    <form action="php/logout_script.php" method="POST">
                        <button type="submit" name="logout" id="logout" class="btn mt-2"><i class="fas fa-power-off fa-2x"></i></button>
                    </form> -->
                <?php 
                // } else { 
                ?>
                <!-- Extra large modal -->

                    <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="far fa-user fa-2x"></i></button>

                    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="container_fluid">
                                    <div class="row">

                                        <!-- Login Form -->
                                        <div class="col-4 border-right border-secondary">
                                            <form action="php/login_script.php" method="post" id="formLogin">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Se connecter</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <label for="login">Login</label>
                                                        <input type="email" class="form-control" name="login" id="login"
                                                            placeholder="Enter your e-mail">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" name="password" id="password"
                                                            placeholder="Enter your password">
                                                        <div class="form-group form-check mt-3">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Resté connecté ?</label>
                                                        </div>
                                                        <div>
                                                            <a href="#">Mot de passe oublié ?</a>
                                                        </div>
                                                        <input id="use_last_login" name="use_last_login" type="hidden" value="<?php echo date('Y\-m\-d G:i:s'); ?>">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" name="loginButton" id="loginButton" class="btn btn-primary mt-2 d-flex align-items-end">Log in</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Register Form -->
                                        <div class="col-8 border-left border-secondary">
                                            <form action="php/login_script.php" method="post" id="formRegister">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">S'enregister</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="name">Last name</label>
                                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Last name">
                                                            <span id="errorName"></span>
                                                            <label for="firstname">First name</label>
                                                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your first name">
                                                            <span id="errorFirstname"></span>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="loginRegister">Login</label>
                                                            <input type="email" class="form-control" name="loginRegister" id="loginRegister"
                                                                placeholder="Enter your e-mail">
                                                            <div id="errorLoginReg"></div>
                                                            <label for="passwordRegister">Password</label>
                                                            <input type="password" class="form-control" name="passwordRegister" id="passwordRegister"
                                                                placeholder="Enter your password">
                                                            <div id="errorPassReg"></div>
                                                            <label for="password">Confirm your password</label>
                                                            <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                                                                placeholder="Enter your password">
                                                            <div id="errorConfirm"></div>
                                                        </div>
                                                        <input id="use_d_register" name="use_d_register" type="hidden" value="<?php echo date('Y\-m\-d G:i:s'); ?>">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" name="register" class="btn btn-primary mt-2" value="register">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                // } 
                ?>
            </div>
        </nav>

        <!-- Banner (if there are several image, use a carousel)-->
        <div class="card bg-dark text-white mt-1">
            <!-- I can link the page of the promotions in the "href" -->
            <a href="index.html"><img src="assets/images/promotion.jpg" class="card-img"
                    alt="promotion sur les lames de terrasse"></a>
        </div>