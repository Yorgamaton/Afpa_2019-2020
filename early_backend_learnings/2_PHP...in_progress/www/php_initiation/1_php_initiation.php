<html>
  <body>    
    <p>Ecrivez un script qui affiche l'adresse IP du serveur et celle du client.</p>
    <?php 

      echo "L'adresse IP du serveur est ",$_SERVER["SERVER_ADDR"];
      echo "<br>";
      echo "L'adresse IP du client est ",$_SERVER["REMOTE_ADDR"];
    ?>   
  </body>  
</html>