<html>
  <body>   
    <h1>Exercice 1</h1>
    <p>Ecrire un script PHP qui affiche tous les nombres impairs entre 0 et 150, par ordre croissant : 1 3 5 7...</p> 
 <?php 
    for ($i=1; $i<150; $i++){
      if ($i%2 !=0){
        echo $i,", ";
      }
    }
    ?>
  </body>  
</html>