<?php
// fonction de vérification des id inexistant
function verif($produit)
{
    if(!$produit)
    {
        die("ID : ". $_GET["pro_id"]." inexistant");
    }
}
?>