<html>
  <body>   
    <h1>Exercice 2</h1>
    <p>Écrire un programme qui écrit 500 fois la phrase Je dois faire des sauvegardes régulières de mes fichiers.</p> 
    <?php 
    $phrase = "Je dois faire des sauvegardes régulièsères de mes fichiers";
    $nbr_p = 1;

    while ($nbr_p<500){
        echo $nbr_p, " : ", $phrase, "<br>";
        $nbr_p++;
    }
    ?>
  </body>  
</html>