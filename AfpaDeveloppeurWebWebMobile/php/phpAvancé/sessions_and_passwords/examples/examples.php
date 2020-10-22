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
    <p>Une session est moyen de transmettre des informations sur toute la durée de la navigation.</p>
    <h2>Fonctionnement d'une session :</h2>
    <?php

    session_start(); // on commence toujours par ouvrir la sessionavant de manipuler la superglobale $_SESSION

    $_SESSION["login"] = "webmaster"; //Entre crochet est le non de la variable à laquelle on a attribué une valeur
    echo $_SESSION["login"]; //permet d'afficher la valeur
    echo "<br>";
    var_dump($_SESSION); // permet d'afficher le tableau de la session

    session_destroy(); // Abandonne les changements sur le tableau de session et termine la session
    ?>

    <h2>L'identifiant de session :</h2>
    <?php
    session_start();

    $_SESSION["login"] = "webmaster";
    $_SESSION["role"] = "admin";

    echo "- session ID : " . session_id();
    /*session_id() permet de créer un identifiant aléatoire composé de lettres et de chiffres.
    la fonction retourne un chaîne vide s'il n'y a pas de session courante
    IMPORTANT: ne pas nommer la session -> ex: session_id("12345"); */

    session_destroy();
    ?>

    <p>L'id de session est stocké dans un cookie du côté client mais aussi du côté serveur. <br>
        <!-- TODO: Regarder comment utiliser la base de données pour stocker le numéro de session -->
        <span style="background-color: yellow;"> Il existe le sur une base de données : ce qui est plus sécurisé !</span>
    </p>

    <h2>Tester la session</h2>


    <?php

    session_start();

    $_SESSION["login"] = "webmaster"; //Entre crochet est le non de la variable à laquelle on a attribué une valeur

    if ($_SESSION["login"]) {
        echo "Vous êtes autorisé à voir cette page.";
    } else {
        echo "Cette page nécessite une identification.";
    }

    session_destroy();

    ?>

    <!-- On peut réduire ce code : -->

    <?php
    echo "<br>";
    session_start();

    $_SESSION["login"] = "webmaster"; //Entre crochet est le non de la variable à laquelle on a attribué une valeur

    if (!isset($_SESSION["login"])) {
        header("Location:examples.php");
        exit;
    }

    // Reste du code (PHP/HTML)
    echo "Bonjour " . $_SESSION["login"] . "<br>";

    /* IMPORTANT :  il faut bien entendu contrôler les données postées
    (filtrer le format, interroger la base de données pour l'identifiant et le mot de passe)
    et surtout ne pas affecter directement dans les variables de session le résultat des données transmises
    */

    session_destroy();

    ?>

    <h2>Nommer une session :</h2>
    <?php
    session_start();

    echo "- Nom de la session : " . session_name();

    session_destroy();
    ?>
    <h3>Il est possible de nommer explicitement la session :</h3>
    <?php

    session_name("afpa");

    session_start();

    echo "- Nom de la session : " . session_name();
    // Les noms de session ne peuvent pas contenir uniquement des chiffres, au moins une lettre doit être présente. Sinon, un identifiant de session sera généré à chaque fois.

    session_destroy();

    ?>

    <h2>Détruire une session</h2>
    <p>On utilisera la fonction unset() avec en paramètre la variable de la session à détruire pour par exemple se
        déconnecter en cliquant sur un lien</p>
    <p>unset($_SESSION["login"]);</p>
    <p>unset($_SESSION["role"]);</p>
    <p style="background-color: yellow;">CELA NE SUFFIT PAS A DETRUIRE COMPLÈTEMENT ET PROPREMENT UNE SESSION !</p>

    <h3>Pour la détruire proprement :</h3>
    <ul>
        <li> Les variables sont vidés par l'affection d'un tableau</li>
        $_SESSION["login"] = array();<br>
        $_SESSION["role"] = array();<br><br>
        <li>destruction des variables session</li>
        unset($_SESSION["login"]);<br>
        unset($_SESSION["role"]);<br><br>
        <li>On fait expirer le cookie en termes de date avec la fonction <span style="background-color: lightgrey;">setcookie()</span>
        </li>
        <!-- Cette méthode ne fonctionne que si on gère les sessions par cookies, d'où la condition. -->
        if (ini_get("session.use_cookies")) <br>
        {<br>
        &emsp; setcookie(session_name(), '', time()-42000);<br>
        <!-- &emsp; est ce qu'on appelle un espace cadratin et permet de faire une tabulation -->
        }<br>
        <li>on détruit le reste de la session :</li>
        session_destroy();
    </ul>

    <h2>Configuration avancée et sécurité :</h2>

    <a href="../exercises/exercises.php" class="btn btn-primary m-1" role="button" aria-pressed="true">Exercice :
        Formulaire d'authentification.</a>
    <p>Le PHP permet une configuration (directives du fichier php.ini) assez fine des sessions : volume de données,
        durée, mode de stockage et sécurité.</p>

    <h4>L'ensemble des commandes ici doivent être vérifié dans le <u>php.ini</u></h4>
    <ul>
        <li><span style="background-color:lightgrey;">session.cookie_lifetime = 0</span> : permet de définir si le
            cookie de session sera stocké de manière permanente (0 = off = stocké de manière permanante || 1 = on).
        </li>
        <li><span style="background-color:lightgrey;">session.use_cookie = 1</span> : permet de dire de stocker les
            session en tant que cookie.
        </li>
        <li><span style="background-color:lightgrey;">session.use_only_cookies = 1</span> : pour forcer php à utiliser
            et miantenir les cookies pour sauvegarder l'identifiant de session, et non pas autre chose. Permet d'éviter
            une injonction d'identifiant de session
        </li>
        <li><span style="background-color:lightgrey;">session.use_strict_mode = 1</span> : permet d'empêcher
            l'utilisation d'un identifiant qui n'a pas été initialisé pour prévenir une injection.
        </li>
        <li><span style="background-color:lightgrey;">session.cookie_httponly = 1</span> : permet d'éviter l'accès aux
            cookies via javascript.
        </li>
        <li><span style="background-color:lightgrey;">session.cookie_secure = 1</span> : fonctionne comme le paramètre
            précédent mais pour le https. Il faut donc vérifier la plateforme sur laquelle on bosse.
        </li>
        <li><span style="background-color:lightgrey;">session.use_trans_sid = 0</span> : permet de supprimer la
            possibilité d'injecter un identifiant de session.
        </li>
        <li><span style="background-color:lightgrey;">session.cache_limiter = nocache</span> : permet de na pas avoir un
            cache de l'identifiant de session.
        </li>
        <li><span style="background-color:lightgrey;">session.hash_function = "sha256"</span> : permet hacher
            l'identifiant de session.
            <p>On peut utiliser la function <span style="background-color:lightgrey;">hash_algos()</span> pour retourner
                un tableau de l'ensemble des hachages possibles et mettre l'index 5 qui correspond à "sha256" :</p>
            <textarea name="" id="" cols="30" rows="4"><?= var_dump(hash_algos()); ?></textarea></li>
        <li><span style="background-color:lightgrey;">session.status()</span> qui peut retourner :
            <ul>
                <li>0 (PHP_SESSION_DISABLED) : permet de savoir que les sessions ne sont pas activés.</li>
                <li>1 (PHP_SESSION_NONE) : permet de savoir qu'il n'y a pas de session mais qu'elles sont bien
                    activés.
                </li>
                <li>2 (PHP_SESSION_ACTIVE) : permet de savoir que les sessions sont activés et qu'on est en train de
                    s'en servir.
                </li>
            </ul>
        </li>
    </ul>
    <p>pour aller plus loin :<a
                href="https://www.php.net/manual/fr/session.configuration.php#ini.session.cookie-lifetime">https://www.php.net/manual/fr/session.configuration.php#ini.session.cookie-lifetime</a>
        ou clique ici : <a href="config_php.png" target="_blank">version image</a></p>

    <h2>Les mots de passe :</h2>
    <ul>
        <li><span style="background-color:lightgrey;">password_hash($mdp, PASSWORD_BCRYPT, ['cost' => 10])</span> :
            permet d'hacher le mot de passe. On place en premier paramètre le mot de passe à hacher ($mdp),
            PASSWORD_BCRYPT correspond à la constante qui correspond à l'agorythme blowfish. En troisième argument on
            peut placer des options. Par défault ça a un coup de 10 (La génération du hash doit se faire en 0,5
            secondes, qui est un bon indicateur).
        </li>
        <li><span style="background-color:lightgrey;">password_verify($mdp_form_connexion, $mdp_haché_bdd)</span> :
            permet de vérifier que le mot de passe entré par l'utilisateur correspond au mot de passe haché qui est dans
            la base de données. Si les deux correspondent, cela affichera 1.
        </li>
        <li><span style="background-color:lightgrey;">password_get_info($mdp_hash)</span> : permet de retourner un
            tableau avec l'ensemble des informations comme le cout utilisé, l'algorythm utilisé, etc. C'est une fonction
            utilisé pour notamment refaire un hash de mot de passe (Ex: vouloir redéfinir les options comme modifier le
            cout à 13). on va alors utiliser la fonction suivante:
            <ul>
                <li><span style="background-color:lightgrey;">password_needs_rehash($hashed_mdp, algo, option)</span> :
                    permet de vérifier que le hachage fourni correspond à l'algorithme et aux options spécifiées. Si ce n'est pas le cas, le hachage devrait être re-généré.
                    <h5><u><b>Exemple :</b> </u></h5>
                    <p>
                        $password = 'rasmuslerdorf';<br>
                        $hash = '$2y$10$YCFsG6elYca568hBi2pZ0.3LDL5wjgxct1N8w/oLR/jfHsiQwCqTS';<br>
                        <br>
                        // Le paramètre cost peut évoluer avec le temps en fonction des améliorations<br>
                        // matérielles.<br>
                        $options = array('cost' => 11);<br>
                        <br>
                        // Vérifions d'abord que le mot de passe correspond au hachage stocké<br>
                        if (password_verify($password, $hash)) {<br>
                        &emsp;&emsp;// Le hachage correspond, on vérifie au cas où un nouvel algorithme de hachage<br>
                        &emsp;&emsp;// serait disponible ou si le coût a été changé<br>
                        &emsp; &emsp;if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) {<br>
                        &emsp;&emsp;&emsp;&emsp;// On crée un nouveau hachage afin de mettre à jour l'ancien<br>
                        &emsp;&emsp;&emsp;&emsp;$newHash = password_hash($password, PASSWORD_DEFAULT, $options);<br>
                        &emsp;&emsp;}<br>
                        <br>
                        // On connecte l'utilisateur<br>
                        }<br>
                    </p>
                    <a href="https://www.php.net/manual/fr/function.password-needs-rehash.php">Documentation php !</a>
                </li>
            </ul>
        </li>
        <li><span style="background-color:lightgrey;"></span></li>
        <li><span style="background-color:lightgrey;"></span></li>
    </ul>

</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>