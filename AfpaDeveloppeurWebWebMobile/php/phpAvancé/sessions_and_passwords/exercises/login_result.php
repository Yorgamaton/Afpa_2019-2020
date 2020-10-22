<?php 
include 'util.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if ( !isset($_SESSION["username"]) ) 
	{
        header("Location:exercises.php");
        exit;
    } ?>

    <p>bonjour <?= $_SESSION['username']." N°session: ".session_id();?> !</p>
    <a class="btn btn-primary" href="exercises.php" role="button">Link</a>
</body>
</html>