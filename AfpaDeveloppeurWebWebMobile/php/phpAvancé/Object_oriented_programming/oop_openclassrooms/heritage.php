<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>POO : heritage</title>
    <link rel="stylesheet" href="assets/css/prism.css">
</head>
<body class="line-numbers">
    <div class="container">

        <h1>1. KESAKO? :</h1>
            <p>On parle d'héritage lorsqu'une class B (fille) hérite d'une class A(mère).
            <br>Autrement dit, la class fille hérite de l'ensemble des attributs et méthodes 
            de la class mère (si elles sont publiques).</p>
            <figure class="figure">
                <img src="assets/images/408555.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption">Exemple d'une classe Magicien (fille) 
                héritant d'une classe Personnage (mère)</figcaption>
            </figure>
            <p>On remarque que sur le schéma la class Magicien à hérité des méthodes 
            (qui sont publiques) et pas des attributs (qui sont privés).
            <br> A noter que la class Magicien à bien hérité des attributs mais 
            il ne pourra pas s'en servir, elle passera par les méthodes.</p>
            <div class="alert alert-warning" role="alert">
                Conseil : Noter que pour savoir si telle classe doit hériter d'une autre, il faut pouvoir se dire que "A est un B" (Ex: un magicien est un personnage, un chien est un animal, etc.).
            </div>

        <h1>2. Procéder à un héritage :</h1>
            <p>Pour ce faire, il faut utiliser le mot clé "extends"</p>

<!-- ========================================================== -->
<pre><code class="language-php">class Personnage // Création d'une classe simple.
{

}

// Toutes les classes suivantes hériteront de Personnage.

class Magicien extends Personnage // Notre classe Magicien hérite des attributs et méthodes de Personnage.
{

}
class Guerrier extends Personnage
{

}

class Brute extends Personnage
{

}</code></pre>
<!-- ========================================================== -->

            <div class="alert alert-warning" role="alert">
                Notez ici qu'une mère peux avoir plusieurs filles, mais qu'une fille ne peut 
                avoir qu'une seule mère.
                <br> La mère sert donc de modèle et toutes les classes auront les mêmes attributs et méthodes que "Personnage"!
            </div>

            <p>Chacunes de ces classes fille peuvent avoir leurs propres attributs et méthodes comme dans l'exemple suivant :</p>

<!-- ========================================================== -->
<pre id="pre5"><code class="language-php">class Magicien extends Personnage
{
private $_magie; // Indique la puissance du magicien sur 100, sa capacité à produire de la magie.

    public function lancerUnSort($perso)
    {
        $perso->setDegat($this->_magie); // On va dire que la magie du magicien représente sa force.
    }
}</code></pre>
<!-- ========================================================== -->

        <h1>3. Rédéfinir les méthodes :</h1>

            <p>Si l'on souhaite accéder à un attribut de la class parente pour le modifier, cela va poser 
            problème puisqu'ils sont tous en privés.
            <br>Par exemple, pour redéfinir la méthode "gagnerExpérience()", afin de modifier l'attribut qui stock la magie
            lorsque l'on gagne de l'expérience. Si on la réécrit, on écrase les instructions présentes dans la méthode parente
            (ne permet pas de gagner de l'expérience et lui augmente juste la magie). 
            <br> On va donc devoir appeler la méthode et ensuite ajouter les instructions à l'aide du mot-clé "parent" :</p>

<!-- ========================================================== -->
<pre><code class="language-php">class Magicien extends Personnage
{
    private $_magie; // Indique la puissance du magicien sur 100, sa capacité à produire de la magie.
    
    public function lancerUnSort($perso)
    {
        $perso->setDegats($this->_magie); // On va dire que la magie du magicien représente sa force.
    }
    
    public function gagnerExperience()
    {
        // On appelle la méthode gagnerExperience() de la classe parente
        parent::gagnerExperience();
        
        if ($this->_magie < 100)
        {
        $this->_magie += 10;
        }
    }
}</code></pre>
<!-- ========================================================== -->

        <h1>4. Un nouveau type de visibilité : "protected" </h1>

            <p>Au niveau restrictif, il est à placer entre le type "public" et "private".
            C'est à dire qu'il à les mêmes effets que le type private, à l'exception que toutes 
            classe fille aura accès aux éléments protégés.</p>

<!-- ========================================================== -->
<p>Exemple :</p>
<pre><code class="language-php">class ClasseMere
{
    protected $_attributProtege;
    private $_attributPrive;
    
    public function __construct()
    {
        $this->_attributProtege = 'Hello world !';
        $this->_attributPrive = 'Bonjour tout le monde !';
    }
}

class ClasseFille extends ClasseMere
{
    public function afficherAttributs()
    {
        echo $this->_attributProtege; // L'attribut est protégé, on a donc accès à celui-ci.
        echo $this->_attributPrive; // L'attribut est privé, on n'a pas accès celui-ci, donc rien ne s'affichera (mis à part une notice si vous les avez activées).
    }
}

$obj = new ClasseFille;

echo $obj->_attributProtege; // Erreur fatale.
echo $obj->_attributPrive; // Rien ne s'affiche (ou une notice si vous les avez activées).

$obj->afficherAttributs(); // Affiche « Hello world ! » suivi de rien du tout ou d'une notice si vous les avez activées.</code></pre>
<!-- ========================================================== -->


            <div class="alert alert-warning" role="alert">
                !!!IMPORTANT!!
                <br> Il est conseillé (par Thuillier Victor - openclassrooms) de mettre, de manière générale, le type "protected" aux attributs au lieu de "private"
                a moins que l'on souhaite vraiment que la classe enfant ne puisse y avoir accès. 
            </div>

        <h1>5. Imposer des contraintes :</h1>
            <p>Mettre en places des contraintes revient à faire des <b>abstraction</b> ou des <b>finalisations</b></p>

            <h3>Les abstraction :</h3>

                <h6><b>Classes abstraites :</b></h6>
                    <p>Créer une classe abstraite empêche d'instancier une classe. Mais a noter que celle ci sera néanmoins
                    exploitable dans la classe héritant de la classe abstraite.
                    <br> Exemple :
                    <br> Pour la classe Personnage, on va uniquement créer des objets "magicien", "guerrier", "brute", etc. 
                    De ce fait, on instanciera jamais la classe Personnage. Elle sera définit alors comme <b>modèle</b></p>
                    <ul>
                        <li>Aucun code dans les méthodes; seul leur nom est indiqué; le code sera défini dans les classes utilisant la classe abstraite</li>
                        <li>La visibilité des méthodes doit être au moins au même niveau (ou inférieur) dans la classe abstraite et les classes filles; elle ne peut avoir la visibilité privée </li>
                        <li>Dans une classe abstraite, toutes les méthodes ne sont pas forcèment abstraites; par contre si au moins l'une l'est, il faut déclarer la classe comme étant abstraite (c'est-à-dire ajout du mot-clé abstract devant class).</li>
                        <li>Une classe abstraite n'est pas instanciable</li>
                    </ul>

<!-- ========================================================== -->
<p>Pour déclarer une classe abstraite, on va utiliser le mot-clé "abstract" :</p>
<pre id="pre1"><code class="language-php">abstract class Personnage // Notre classe Personnage est abstraite.
{

}

class Magicien extends Personnage // Création d'une classe Magicien héritant de la classe Personnage.
{

}

$magicien = new Magicien; // Tout va bien, la classe Magicien n'est pas abstraite.
$perso = new Personnage; // Erreur fatale car on instancie une classe abstraite.</code></pre>
<!-- ========================================================== -->

                <h6><b>Méthodes abstraites :</b></h6>
                    <p>Créer une méthode abstraite à pour but de forcer toutes les classes fille d'écrire 
                    cette méthode avec les instructions spécifiques. On écrira dans la classe mère uniquement le prototype.</p>

<!-- ========================================================== -->
<p>Syntaxe à respecter : abstract + visibilité + function + nomDeLaMethode + parenthèses avec ou sans paramètres + point-virgule</p>
<pre><code class="language-php">abstract class Personnage
{
    // On va forcer toute classe fille à écrire cette méthode car chaque personnage frappe différemment.
    abstract public function frapper(Personnage $perso);
    
    // Cette méthode n'aura pas besoin d'être réécrite.
    public function recevoirDegats()
    {
        // Instructions.
    }
}

class Magicien extends Personnage
{
    // On écrit la méthode « frapper » du même type de visibilité que la méthode abstraite « frapper » de la classe mère.
    public function frapper(Personnage $perso)
    {
        // Instructions.
    }
}</code></pre>
<!-- ========================================================== -->
                    
                    <div class="alert alert-warning" role="alert">
                    !!!IMPORTANT!!
                    <br> Pour définir une méthode comme abstraite il faut que la class le soit.
                </div>

            <h3>Les finalisations :</h3>
                
                <h6><b>Classes finales :</b></h6>
                    <p>A contraio de la classe abstraite, la classe finale ne peut pas être définit comme modèle. Autrement dit, 
                    on ne peut pas créer de class fille à partir de cette classe.</p>
                    <div class="alert alert-warning" role="alert">
                    Il n'est pas conseillé de mettre une classe en classe finale pour laisser la liberté d'hériter de n'importe quelle classe.
                    </div>

<!-- ========================================================= -->
<p>Pour déclarer une classe final, on va utiliser le mot-clé "final" :</p>
<pre><code class="language-php">// Classe abstraite servant de modèle.

abstract class Personnage
{

}

// Classe finale, on ne pourra créer de classe héritant de Guerrier.

final class Guerrier extends Personnage
{

}

// Erreur fatale, car notre classe hérite d'une classe finale.

class GentilGuerrier extends Guerrier
{

}</code></pre>
<!-- ========================================================= -->



                <h6><b>Méthodes finales :</b></h6>
                    <p>Une méthode déclaré comme final sera automatiquement hérité par la classe fille 
                    et ne pourra en aucun cas être redéfinit !</p>

<!-- =============================================================== -->
<pre><code class="language-php">abstract class Personnage
{
    // Méthode normale.
    
    public function frapper(Personnage $perso)
    {
        // Instructions.
    }
    
    // Méthode finale.
    
    final public function recevoirDegats()
    {
        // Instructions.
    }
}

class Guerrier extends Personnage
{
    // Aucun problème.
    
    public function frapper(Personnage $perso)
    {
        // Instructions.
    }
    
    // Erreur fatale car cette méthode est finale dans la classe parente.
    
    public function recevoirDegats() // ceci n'est donc pas possible !!!
    {
        // Instructions.
    }
}</code></pre>
<!-- =============================================================== -->

        <h1>6. Résolution statique à la volée :</h1>

        <div class="alert alert-warning" role="alert">
            To be continued ...
        </div>                
        <!-- <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5">
            </textarea>
        </div> -->

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/prism.js"></script>
</body>
</html>