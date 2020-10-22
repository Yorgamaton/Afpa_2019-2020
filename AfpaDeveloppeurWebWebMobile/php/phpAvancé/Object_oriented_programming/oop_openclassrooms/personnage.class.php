<?php
// TODO: Mettre les lignes des différentes structures dans les exemples
/*
LES CLASSES : 
A noter qu'elle commence toujours par une majuscule (Respect de la notation PEAR)
Par convention, l'appeler maClasse.class.php.

Private: Donne accès aux attributs et méthodes uniquement dans la classe
public : On pourra y avois accès de n'importe où (à l'extérieur et à l'intérieur de la classe)

*/

class Personnage
{
    /* 
    LES ATTRIBUTS : (variables)
    Il est préférable de précéder l'attibut d'un underscore "_" (il s'agit d'une notation PEAR)
    On est également libre de les initialiser, c'est à dire de leur attribuer une valeur
    --> A noter que cette valeur doit être une expression scalaire statique 
        une variable scalaire sont celles qui contiennent des entiers, des nombres décimaux, 
        des chaînes de caractères ou des booléens. Les types array, object et resource ne sont 
        pas scalaires.
        Elles ne peuvent pas être issue d'un appel à une fonction ou d'une variable (superglobale ou non)
    Tous les attributs doivent être privé
    */
    private $_force; // La force du personnage est de 50 par défaut
    private $_localisation; // Sa localisation est Amiens par défaut;
    private $_experience; // Son expérience est de 1 par défaut
    private $_degats; // Ses dégâts est de 0 par défaut

    // Attribut static privé.
    private static $_texteADire = 'Je vais tous vous tuer !';
    
    // Les constantes :
    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 80;

    /*
    Le constructeur :
        -> il permet de d'initialiser les attributs dès sa créaction sans connaitre leurs valeurs à l'avance
        (Au lieu de le faire manuellement comme fait jusqu'à présent). 
        Elle renvoit à une méthode écrite dans la classe qui va permettre de construire l'objet (si des atrtibuts
        doivent initialiss ou qu'un connexion à la BDD doit être faite, c'est ici que ça se passe).
            A noter que le constructeur est exécuté dès la création de l'objet et par conséquent, aucune valeur ne doit être retournée. 
            A noter également qu'un constructeur n'est pas obligatoire

    */    
    public function __construct($force, $degats) // Constructeur demandant 2 paramètres
    {
        echo 'Personnage créé avec '.$force.' de force et '.$degats.' de dégâts <br>'; // Message s'affichant une fois que tout objet est créé.
        $this->setForce($force); // Initialisation de la force.
        $this->setDegats($degats); // Initialisation des dégâts.
        $this->_experience = 1; // Initialisation de l'expérience à 1.
    }

    /*
    LES METHODES : (functions)
    Se met générallement en public
    */

    public function deplacer()
    // Une méthode qui déplacera le personnage (modifiera sa localisation).
    {

    }

    public function frapper(Personnage $persoAFrapper)
    /* 
    Mettre le nom de la classe avant le paramètre permet de s'assurer que 
    la méthode ne sera exécuter que si le paramètre passé est de type "Personnage".
    
    Une méthode qui frappera un personnage (suivant la force qu'il a).
    L'argument de la fonction va permettre de f aire le lien entre le personnage 
    que l'on va mettre lors de l'appel de la mathode, et ce qu'il va subir.
    */
    {
        $persoAFrapper->_degats += $this->_force;
        /* 
        On va chercher dans un premier temps les dégâts dans l'attribut $_degats
        Puis on va additionner au $perso2 la force du $perso1 
        ($this représentant ici le $perso1 car c'est le personnage à partir 
        duquel on à appelé la méthode)
        */
    }

    public function gagnerExperience()
    // Une méthode augmentant l'attribut $experience du personnage.
    {
        // Cette méthode doit ajouter 1 à l'expérience du personnage.
        $this->_experience++;
        // ou $this->_experience += 1;
    }

    // Notez que le mot-clé static peut être placé avant la visibilité de la méthode (ici c'est public).
    public static function parler()
    {
        echo self::$_texteADire; // On donne le texte à dire.
        /* self permet d'appliquer l'élement à la class elle-même.
        Autrement dit, « Dans moi-même, donne-moi l'attribut statique $_texteADire. »*/
    }



    /*
    Accesseurs et mutateurs :
        -> Accesseurs (ou getters): 
        Il va permettre d'accéder à un attribut. Par convention, ces méthodes portent le 
        même nom que l'attribut préfixé de "get" dont elles renvoient la valeur (Ex: getDegats).
        -> Mutateurs (ou setters): 
        Il va permettre de modifier la valeur d'un attribut. Par convention, ces méthode portent
        le même nom que l'attribut préfixé de "set" dont elles renvoient la valeur (Ex: setForce).
    */

    // Nous déclarons une méthode dont le seul but est d'afficher le nombre de dégâts subit
    public function getDegats()
    {
        return $this->_degats;
        //  OR echo "<br>Le personnage a subit ".$this->_degats." de dégâts";
    }
     // Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_force.
    public function getForce()
    {
        return $this->_force;
    }
            
    // Ceci est la méthode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience.
    public function getExperience()
    {
        return $this->_experience;
        // Or echo "<br>L'expérience du personnage est de : ".$this->_experience;
    }

      // Mutateur chargé de modifier l'attribut $_force.
    public function setForce($force)
    {
        if (!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
        {
        trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
        return;
        }
        
        if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
        {
        trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
        return;
        }
        
        // On vérifie qu'on nous donne bien soit une « FORCE_PETITE », soit une « FORCE_MOYENNE », soit une « FORCE_GRANDE ».
        if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE]))
        {
            $this->_force = $force;
        }
        else
        {
            $this->_force = $force;
        }
    }
    
    // Mutateur chargé de modifier l'attribut $_experience.
    public function setExperience($experience)
    {
        if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
        {
        trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
        return;
        }
        
        if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
        {
        trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
        return;
        }
        
        $this->_experience = $experience;
    }
     // Mutateur chargé de modifier l'attribut $_degats.
    public function setDegats($degats)
    {
        if (!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
        {
        trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
        return;
        }

        $this->_degats = $degats;
    }
    

}

echo '<h1>Création d\'un objet</h1> 
$perso1 = new Personnage(0, 0); 
<br>$perso2 = new Personnage (0, 0);<br><br>
<u><b>Le code va nous retourner les réponses suivantes :</b></u><br>';
$perso1 = new Personnage(0, 0); 
$perso2 = new Personnage (0, 0);

echo '<p>Ici, "$perso" sera un objet de type "personnage". On dit que l\'on instancie 
la classe Personnage, que l\'on crée une instance de la classe Personnage.</p>';


echo '<h1>Appeler les méthodes de l\'objet</h1>
$perso1->parler();<br><br>
<u><b>Le code va nous retourner la réponse suivante :</b></u><br>';
$perso1->parler();


echo '<br>L\'opérateur "->" permet donc d\'atteindre la méthode. Mais nous pouvons 
également atteindre un attribut<br>
<br>!!!Attention!!!<br>
    On peut l\'atteindre en dehors de la classe uniquement quand l\'attribut est "public". 
    Sinon ça sera dans la classe lorsqu\'il est "private"';



echo '<h1>Accéder aux attributs de l\'objet :</h1>
Pour faire cela, on va devoir utiliser la speudo-variable "$this"
Elle va permettre de représenter l\'objet que l\'on est actuellement en train d\'utiliser
De ce fait, $perso et $this représentent le même objet
<br>$perso1->getExperience();
<br>$perso1->gagnerExperience();
<br>$perso1->getExperience();
<br><br><u><b>Le code va nous retourner les réponses suivantes :</b></u><br>';

echo 'Le personnage a '.$perso1->getExperience().' d\'expérience ! <br>';
echo 'Le personnage a gagné de l\'expérience ! avec "$perso1->gagnerExperience();"<br> ';
$perso1->gagnerExperience();
echo 'Le personnage a '.$perso1->getExperience().' d\'expérience ! <br>';



echo '<h1>Implémenter d\'autres méthodes :</h1>
Ici on ve augmenter le nombre de dégâts subit par le personnage n°2 en fonction de le force du personnage n°1. On veut donc que le personnage n°1 frappe le personnage n°2';

echo '<br><br> On va faire appel dans un premier temps à la méthode "frapper()" en plaçant en paramètre le personnage qui va subit des dégats
<br> comme suivant : <br>
$perso1->frapper($perso2);';
$perso1->frapper($perso2);
echo '<br><br><u><b>Le code "$perso2->getDegats()" va nous retourner la réponse suivante :</b></u><br>
Le personnage 2 à donc subit '.$perso2->getDegats().' de dégâts';


echo '<h3>Scénario n°1</h3>

<br><u><b>Création des personnages :</b></u>
<br> Claude : ';
$perso3 = new Personnage (30, 0);
echo 'William : ';
$perso4 = new Personnage (25, 0);

echo '<h3>FIGHT !!! </h3>';
echo 'Claude décide d\'attaquer william !! "$perso3->frapper($perso4);"
'; 
$perso3->frapper($perso4); //le perso2 subit des dégâts

echo '<br>et lui inflige '.$perso4->getDegats().' de dégâts !';
$perso3->gagnerExperience(); //le perso 1 gagne de l'expérience
echo '<br>Claude gagne alors d\'expérience ! "$perso3->gagnerExperience();"';
echo '<br>Il à maintenant '.$perso3->getExperience().' d\'expérience';

echo '<br><br>C\'est maintenant au tour de William d\'attaquer !';
$perso4->frapper($perso3); //le perso1 subit des dégâts
echo '<br>et lui inflige à sont tour '.$perso3->getDegats().' de dégâts !';
$perso4->gagnerExperience(); //le perso2 gagne de l'expérience
echo '<br>Il va gagner à son tour de l\'expérience pour en avoir finalement '.$perso3->getExperience().'.';


echo '<h3>Scénario n°2</h3>
Salma : ';
$perso5 = new Personnage (20, 0);
echo 'William : ';
$perso6 = new Personnage (20, 0);

echo '<br><br><u><b>modification des caractéristiques des personnages :</b></u><br>';
echo 'Avance de lancer le combat, Salma décide de boire une potion d\'expérience ce qui lui permet d\'augmenter son expérience "$perso5->setExperience(49);"
<br>ce qui a eu pour conséquence d\'augmenter sa force "$perso5->setForce(40);"';
$perso5->setExperience(49);
$perso5->setForce(40); //$perso5 à 40 de force
echo '<br>Elle à maintenant '.$perso5->getForce().' de force et à appris l\'attaque FOUET!';

echo '<h3>FIGHT !!! </h3>';
$perso5->frapper($perso6);  // $perso5 frappe $perso2
echo 'Salma, ouvre le combat en essayant sa nouvelle technique sur william et lui inflige '.$perso6->getDegats().' de dégâts!';
$perso5->gagnerExperience(); // $perso5 gagne de l'expérience
echo '<br>Salma gagne 1 d\'expérience et est à maintenant '.$perso5->getExperience().' d\'expérience';
$perso6->frapper($perso5);  // $perso6 frappe $perso1
$perso6->gagnerExperience(); // $perso6 gagne de l'expérience
echo '<br>William, blessé dans son égo, décide de riposter immédiatement en attaquant salma
<br> et lui inflige '.$perso5->getDegats().' de dégâts ce qui lui permet d\'être à '.$perso6->getExperience().' d\'expérience
<br> Salma rigole !<br>' ;


// Ce qui était à la base dans la scénarion. Je l'ai un peu dynamisé.
// echo '<p>Le personnage 5 a ', $perso5->getForce(), ' de force, contrairement au personnage 6 qui a ', $perso6->getForce(), ' de force.</p>';
// echo '<p>Le personnage 5 a ', $perso5->getExperience(), ' d\'expérience, contrairement au personnage 6 qui a ', $perso6->getExperience(), ' d\'expérience.</p>';
// echo '<p>Le personnage 5 a ', $perso5->getDegats(), ' de dégâts, contrairement au personnage 6 qui a ', $perso6->getDegats(), ' de dégâts.</p>';


echo '<h1>Le constructeur :</h1>
!!IMPORTANT!!<br>
    -> Pour initialiser une valeur, on doit utiliser les mutateurs correspondant sous peine de ne pas 
    respecter le principe d\'encapsulation, de ce fait, n\'importe quel type de valeur pourrait être assigné !<br>
    -> Ne jamais associé le type de visibilité "private" à la méthode, sinon, il serait impossible de l\'appeler
    et de ce fait, il serait impossible d\'instancier la classe ! 
    (Cependant, certains cas particuliers nécessitent de passer le constructeur en type "private")

    <br><br>$perso7 = new Personnage(60, 0); // 60 de force, 0 dégât
    <br>$perso8 = new Personnage(100, 10); // 100 de force, 10 dégâts
    
<br><br><u><b>Avec ce code, le constructeur va nous permettre d\'obtenir les réponses suivantes :</b></u><br>';

$perso7 = new Personnage(60, 0); // 60 de force, 0 dégât
$perso8 = new Personnage(100, 10); // 100 de force, 10 dégâts

echo '<h1>L\'Auto-chargement :</h1>

    Conseils:<br> 
        -> créer un fichier par classe, 
Le but ici va être de créer une fonction qui va permettre d\'appeler n\'importe quelle classe 
en plaçant en paramètre le nom de la classe et ainsi éviter de faire autant d\'include qu\'il 
faut de class ! ';

echo '<h3>Appel basique d\'un fichier :</h3>
include \'personnage.php\';
<br><br><b>Puis création d\'un personnage :</b>
<br>$perso1 = new Personnage (90, 0);';

echo "<h3>Appel avec un auto-chargement :</h3>
function loadClass(\$class)
<br>{
    <br>&nbsp;&nbsp;&nbsp;require \$class.'.class.php';
<br>}

<br>spl_autoload_register('loadClass');";
function loadClass($class)
{
    require $class.'.class.php';
}

spl_autoload_register('loadClass');
echo '<br><br><b>Puis création d\'un personnage :</b> $perso1 = new Personnage (90, 0);<br>';
$perso1 = new Personnage (90, 0);
// Plus d'informations sur la fonction spl_autoload_register() -> https://www.php.net/manual/fr/function.spl-autoload-register.php




echo '<h1>L\'opérateur de résolution de portée :</h1>
    Il est représenté pour "::", appelé double deux points (Scope resolution operator).
    Il permet d\'appeler des éléments appartenants à telle classe et non à tel objet.
    Parmis les élements que l\'on peut appeler à l\'aide de cet opérateur, on retrouve :

    <br><b>-> Les constantes de class :</b>
    <br>Elles permettent d\'éviter tout code muet, ne prennent pas de "$" devant son nom
    et sont toujours en majuscule.<br>

<br>$perso10 = new Personnage(50, 0);';

echo '<br><br>Ce code est définit comme muet car on en sait pas à quoi correspond le "50"
<br>(même si, ici, nous savons que là il correspond à la force)
    <br>Par exemple, ce paramètre peut prendre 3 valeurs :
    <br>&nbsp;&nbsp;&nbsp;-> 20 = personnage à une faible force
    <br>&nbsp;&nbsp;&nbsp;-> 50 = personnage à une force moyenne
    <br>&nbsp;&nbsp;&nbsp;-> 80 = personnage sera très fort
    <br><br>Plutôt que de passer les valeurs telles quelles, on va les passer dans une constante.

    <br><br>Une constante est une sorte d\'attribut appartenant à la classe dont la valeur ne change jamais.
    <br>(Voir la création des constantes dans la class juste après les attributs)

    <br><br>Il faut savoir qu\'une constante appartient à la class et non a un objet, de ce fait, 
    <br>on ne pourra pas utiliser "->", "$this" ou encore "$perso". On va donc utiliser l\'opérateur "::"
    <br>pour y accéder.
    <br><br>$perso11 = new Personnage(Personnage::FORCE_GRANDE, 0);
    <br><br><u><b>Le code va nous retourner la réponse suivante :</b></u><br>';

$perso11 = new Personnage(Personnage::FORCE_GRANDE, 0); //fonctionne avec le if dans setForce


echo '<h1>Les méthodes Statiques :</h1>
    Il faut savoir également qu\'il existe des méthodes statiques, c\'est à dire qu\'elle agissent sur la class
    directement et non sur un objet. Il n\'y aura donc aucun "$this" dans ces méthodes.
    <br>A noter que même si elle est dite "statique", elle peut être appelée sur un objet.
    par convention, le nom d\'une méthode sera précédé de "static"

    <br><br><u><b>Le code "Personnage::parler();"va nous retourner la réponse suivante :</b></u><br>';

Personnage::parler();
echo '<br><br><u><b>Ca fonctionne également juste en appelant la méthode sur un personnage "$perso11->parler();"</b></u><br>';
$perso11->parler();


echo '<br><b>!!!ATENTION!!!<br>
        Cependant, il faut préférer appeler les méthodes statiques avec l\'opérateur "::"
        De cette manière, on sait qu\'on a décider d\'invoquer une méthode statique 
        et permettra d\'éviter une erreur de degré "E_STRICT".</b>';

echo '<h1>Les attributs statiques :</h1>
    Le principe est le même, c\'est à dire que l\'attribut statique appartient à la class et non à l\'objet
    <br> Ainsi, tous les objets auront accès à cet attribut et cet attribut aura la même valeur pour tous les objets.
    <br>Comme pour la méthode, il faudra précéder l\attribut du mot "static" (Ex: private static $_texteADire = \'je vais vous tuer\';)
    <br> Ne pas oublier de "$" puisque c\'est un attribut !

    <br><br>Les attributs statiques permettent de modifier les attributs appartenant à la class et ainsi avoir des attributs 
    <br>indépendants de tout objet. Ces objets auront tous la même valeur sauf si celui-ci modifie la valeur.
    <br>A noter que si l\'objet modifie sa valeur, tous les autres objets qui accederont à cet attribut obtiendront la nouvelle valeur. ';


echo '<h1>Exercice :</h1>
Cet exercice va uniquement permettre de savoir combien de fois a été instancié la class.';
class Counter
{
    private static $_counter = 0; 
    /* 
    On utilise un attribut static puisqu'il appartient uniquement à la class et pas à un objet
    Cela retournera donc le même chiffre pour tous les objets.
    */


    public function __construct()
    {
        self::$_counter++; //La création d'une class va incrémenter l'attribut $_counter  
    }


    public static function getCounter() // Méthode statique qui renverra la valeur du compteur.
    {
        return self::$_counter;
    }
}
$test1 = new Counter;
$test2 = new Counter;
$test3 = new Counter;

echo 'La class a été instancié '.counter::getCounter().' fois.';
