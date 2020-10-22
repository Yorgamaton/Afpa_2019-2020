<body>
    <html>

    <style>
    
    </style>

    <h1>Exercice3</h1>
    <p>Ecrire un script qui affiche la table de multiplication totale de {1,...,12} par {1,...,12}, le résultat doit être le suivant :</p> 
    <p>objectif :</p>

    <?php 
    echo "<img src='php_03_exercice3.jpg' alt='' title='résultat à obtenir'>";
    ?>

    <p>Résulat :</p>

    <?php
    function multi($j){
        for ($i=0; $i<13; $i++){
            echo $i*$j. " ";
        } 
    }

    for ($i=-1; $i<13; $i++){
        if ($i == -1) $i = '';
        echo $i;
    }
    
    echo "<br>";

    for ($i=0; $i<13; $i++){
        echo $i," ", multi($i), " ", "<br>";      
    }
    ?>

    </html>
</body>