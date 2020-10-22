<?php
include 'util.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">

    <a href="../examples/examples.php" class="btn btn-primary m-1" role="button" aria-pressed="true">Aller au Cours</a>
    <h2>Configuration avancée et sécurité :</h2>

    <a href="https://www.php.net/manual/fr/session.security.php"> Documentation php : session et sécurité.</a>
    
    <div class="row">
        <?php if(is_logged()) { ?>
            <p>bonjour <?= $_SESSION['username']."! id de la session: ".session_id();?> !</p>
            <form action="logout_script.php" method="POST">
                <button type="submit" name="logout" id="logout" class="btn btn-primary mt-2">Log out</button>
            </form>
        <?php } else { ?>
            <div class="form-group col-6">
                <!--Register Form-->
                <form action="login_script.php" method="post" id="formLogin">
                    <fieldset>
                        <legend>S'identifier :</legend>
                        <label for="login">Login</label>
                        <input type="email" class="form-control" name="login" id="login"
                            placeholder="Enter your e-mail">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Enter your password">
                        <button type="submit" name="loginButton" id="loginButton" class="btn btn-primary mt-2">Register
                        </button>
                    </fieldset>
                </form>
            </div>

            <div class="form-group col-6">
                <!--Register Form-->
                <form action="login_script.php" method="post" id="formRegister">
                    <fieldset>
                        <legend>S'inscrire :</legend>
                        <label for="loginRegister">Login</label>
                        <input type="email" class="form-control" name="loginRegister" id="loginRegister"
                            placeholder="Enter your e-mail">
                        <div id="errorLoginReg"></div>
                        <label for="passwordRegister">Password</label>
                        <input type="password" class="form-control" name="passwordRegister" id="passwordRegister"
                            placeholder="Enter your password">
                        <div id="errorPassReg"></div>
                        <label for="password">Confirmed your password</label>
                        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                            placeholder="Enter your password">
                        <div id="errorConfirm"></div>
                        <button type="submit" name="register" class="btn btn-primary mt-2" value="register">Register
                        </button>
                    </fieldset>
                </form>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <p>Only people who are connected can go to the <a class="btn btn-primary" href="login_result.php" role="button">Heaven</a></p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>


