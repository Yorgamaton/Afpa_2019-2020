<?php
$pass = 'motdepasse';
$pass2 = 'testverify';
// todo : pourquoi vérifier le retour de la fonction password_hash? si une erreur survient elle retourne false et pas le mdp
echo password_hash($pass, PASSWORD_BCRYPT); // To hash a password and display the hashed password
$hash = password_hash($pass, PASSWORD_BCRYPT);
echo "<br>Si 1 alors le mot de passe est vérifié : ".password_verify($pass, $hash)." sinon il affichera rien : ".password_verify($pass2, $hash)."<br>"; // to verify the correspundance between the typed password and the hashed password
var_dump(password_get_info($hash));
echo "<br>";
//todo : vérifier comment fonctionne cette fonction
echo password_needs_rehash($hash, PASSWORD_BCRYPT, ['cost' => 15]);
echo $hash;