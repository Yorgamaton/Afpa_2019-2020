<?php
    date_default_timezone_set("Europe/Paris");
    require 'connexion_db.php';

    function loadClass($class)
    {
        require $class.'.class.php';
    }
    spl_autoload_register('loadClass');


    $db = connexionBase();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice POO</title>
</head>
<body>

    <h3>Ancienneté dans l'entreprise :</h3>
<?php
    $manager = new EmployeManager($db);
    $manager->afficheAnciennete();
?>

    <h3>Traitement de la prime :</h3>
    <?php
        $manager->primes();
    ?>
    <h3>Nombre d'employés dans l'entreprise :</h3>
    <p>
    <?php
        $manager->countEmp();
    ?>
    </p>
    <h3>La liste détaillée des employés triés par nom de famille puis prénom:</h3>
    <?php
        $manager->listTrieNomPrenom();
    ?>
    <h3>La liste détaillée des employés triés par service, nom puis prénom : </h3>
    <?php
        $manager->listTrieServiceNomPrenom();
    ?>
    <h3>Ce que représente le coût de la masse salariale (Salaire + primes)</h3>
    <?php
        $manager->coutSalarial();
    ?>

    <h3>Les modes de restauration de chaque emplyé selon l'agence :</h3>
    <?php
        $manager->typeRestauration();
    ?>

    <h3>Est-ce que l'employé bénéficie des chèques vacances ?</h3>
    <?php
        $manager->distributionCheques();
    ?>
</body>
</html>