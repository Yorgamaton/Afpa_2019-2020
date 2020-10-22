<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/prism.css">
    <title>POO : données stockées</title>
</head>
<body class="line-numbers">
    <div class="container">
        <h1>Manipulation de données stockées :</h1>

<!-- ============================================================== -->
<pre id="pre4"><code class="language-php">Class Personnage 
{

}</code></pre>
<!-- ==================================================================== -->

        Une classe est composée de deux parties (éventuellement trois) :<br>
        &nbsp;&nbsp;&nbsp;-> une partie déclarant les attributs. Ce sont les caractéristiques de l'objet ;<br>
        &nbsp;&nbsp;&nbsp;-> une partie déclarant les méthodes. Ce sont les fonctionnalités de chaque objet ;<br>
        &nbsp;&nbsp;&nbsp;-> éventuellement, une partie déclarant les constantes de classe. Nous nous en occuperons en temps voulu.<br><br>

        Lorsque l'on veut construire une classe, il va donc falloir systématiquement se poser les mêmes questions :<br>
        &nbsp;&nbsp;&nbsp;-> Quelles seront les caractéristiques de mes objets ?<br>
        &nbsp;&nbsp;&nbsp;-> Quelles seront les fonctionnalités de mes objets ?


        <h3>Commençons par les attributs :</h3>
        Ils correspondent aux différentes colonnes du tableau dans la BDD :

<!-- ==================================================================== -->
<pre id="pre5"><code class="language-php">Class Personnage 
{
    private $_id;
    private $_nom;
    private $_forcePerso;
    private $_degats;
    private $_niveau;
    private $_experience;    
}</code></pre>
<!-- ==================================================================== -->


        <h3>Il faut maintenant implémenter (écrire) les getters et les setters :</h3>

        Pour construire nos setters, il faut donc nous pencher sur les valeurs possibles de chaque attribut :
        <br>&nbsp;&nbsp;&nbsp;les valeurs possibles de l'identifiant sont tous les nombres entiers strictement positifs ;

        <br>&nbsp;&nbsp;&nbsp;les valeurs possibles pour le nom du personnage sont toutes les chaînes de caractères ;

        <br>&nbsp;&nbsp;&nbsp;les valeurs possibles pour la force du personnage sont tous les nombres entiers allant de 1 à 100 ;

        <br>&nbsp;&nbsp;&nbsp;les valeurs possibles pour les dégâts du personnage sont tous les nombres entiers allant de 0 à 100 ;

        <br>&nbsp;&nbsp;&nbsp;les valeurs possibles pour le niveau du personnage sont tous les nombres entiers allant de 1 à 100 ;

        <br>&nbsp;&nbsp;&nbsp;les valeurs possibles pour l\'expérience du personnage sont tous les nombres entiers allant de 1 à 100.

<!-- =================================================================== -->
<pre><code class="language-php">class Personnage
{
    private $_id;
    private $_nom;
    private $_forcePerso;
    private $_degats;
    private $_niveau;
    private $_experience;
    
    // Liste des getters
    
    public function getId()
    {
        return $this->_id;
    }
    
    public function getNom()
    {
        return $this->_nom;
    }
    
    public function getForcePerso()
    {
        return $this->_forcePerso;
    }
    
    public function getDegats()
    {
        return $this->_degats;
    }
    
    public function getNiveau()
    {
        return $this->_niveau;
    }
    
    public function getExperience()
    {
        return $this->_experience;
    }
    
    // Liste des setters
    
    public function setId($id)
    {
        // On convertit l\'argument en nombre entier.
        // Si c\'en était déjà un, rien ne changera.
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d\'important ici).
        $id = (int) $id;
        
        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($id > 0)
        {
            // Si c\'est le cas, c\'est tout bon, on assigne la valeur à l\'attribut correspondant.
            $this->_id = $id;
        }
    }
    
    public function setNom($nom)
    {
        // On vérifie qu\'il s\'agit bien d\'une chaîne de caractères.
        if (is_string($nom))
        {
            $this->_nom = $nom;
        }
    }
    
    public function setForcePerso($forcePerso)
    {
        $forcePerso = (int) $forcePerso;
        
        if ($forcePerso >= 1 && $forcePerso <= 100)
        {
            $this->_forcePerso = $forcePerso;
        }
    }
    
    public function setDegats($degats)
    {
        $degats = (int) $degats;
        
        if ($degats >= 0 && $degats <= 100)
        {
            $this->_degats = $degats;
        }
    }
    
    public function setNiveau($niveau)
    {
        $niveau = (int) $niveau;
        
        if ($niveau >= 1 && $niveau <= 100)
        {
            $this->_niveau = $niveau;
        }
    }
    
    public function setExperience($experience)
    {
        $experience = (int) $experience;
        
        if ($experience >= 1 && $experience <= 100)
        {
            $this->_experience = $experience;
        }
    }
} //fin de la class</code></pre>
<!-- ==================================================================== -->



        <h3>Récupération dans la base de données :</h3>
        <?php

            class Personnage
            {
                private $_id;
                private $_nom;
                private $_forcePerso;
                private $_degats;
                private $_niveau;
                private $_experience;
                
                // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
                public function hydrate(array $donnees)
                {
                    /*
                    if (isset($donnees['id']))
                    {
                        $this->_id = $donnees['id'];
                    }
                    !!!PAS BON CAR NE PERMET PAS DE VERIFIER LES VALEURS !!! 
                    Il faut utiliser les function "set"

                    if (isset($donnees['id']))
                    {
                        $this->setId($donnees['id']);
                    }
                    !!! PAS BON NON PLUS CAR N'EST PAS FLEXIBLE (NE PERMET PAS D'AJOUTER UN ATTRIBUT) 
                    AMENE A MODIFIER LA METHODE hydrate(). DE PLUS CELA EST LONG !!! 

                    On va alors utiliser une boucle !!! 
                    */
                    foreach ($donnees as $key => $value)
                    {
                        /* 
                        La clé ($key) correspond au nom de chacun des méthodes "set" 
                        Donc bien faire attention lorsque l'on choisit les noms des colonnes dans la BDD
                        On utilise ucfirst pour mettre en majuscule la première lettre
                        */
                        $method = 'set'.ucfirst($key);
                        
                        // On vérifie qu'une méthode existe pour une class
                        // https://www.php.net/manual/fr/function.method-exists.php
                        if (method_exists($this, $method))
                        {
                            // On appelle le setter.
                            $this->$method($value);
                        }
                    }
                }

                // Liste des getters
                public function getId() { return $this->_id; }
                public function getNom() { return $this->_nom; }
                public function getForcePerso() { return $this->_forcePerso; }
                public function getDegats() { return $this->_degats; }
                public function getNiveau() { return $this->_niveau; }
                public function getExperience() { return $this->_experience; }
                
                // Liste des setters
                
                public function setId($id)
                {
                    // On convertit l'argument en nombre entier.
                    // Si c'en était déjà un, rien ne changera.
                    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
                    $id = (int) $id;
                    
                    // On vérifie ensuite si ce nombre est bien strictement positif.
                    if ($id > 0)
                    {
                    // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
                    $this->_id = $id;
                    }
                }
                
                public function setNom($nom)
                {
                    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
                    // Dont la longueur est inférieure à 30 caractères.
                    if (is_string($nom) && strlen($nom) <= 30)
                    {
                        $this->_nom = $nom;
                    }
                }
                
                public function setForcePerso($forcePerso)
                {
                    $forcePerso = (int) $forcePerso;
                    
                    if ($forcePerso >= 1 && $forcePerso <= 100)
                    {
                    $this->_forcePerso = $forcePerso;
                    }
                }
                
                public function setDegats($degats)
                {
                    $degats = (int) $degats;
                    
                    if ($degats >= 0 && $degats <= 100)
                    {
                    $this->_degats = $degats;
                    }
                }
                
                public function setNiveau($niveau)
                {
                    $niveau = (int) $niveau;
                     // On vérifie que le niveau n'est pas négatif.
                    if ($niveau >= 1 && $niveau <= 100)
                    {
                    $this->_niveau = $niveau;
                    }
                }
                
                public function setExperience($experience)
                {
                    $experience = (int) $experience;
                    // On vérifie que l'expérience est comprise entre 0 et 100.
                    if ($experience >= 0 && $experience <= 100)
                    {
                    $this->_experience = $experience;
                    }
                }
            }
            
        ?>

        <p>
        <b><u>Le code va retourner ce résultat</b></u><br>
        a de force, de dégâts, d'expérience et est au niveau<br>
        a de force, de dégâts, d'expérience et est au niveau<br>
        a de force, de dégâts, d'expérience et est au niveau<br>
        a de force, de dégâts, d'expérience et est au niveau 
        </p> 
        <p>-> On peut voir ici que l'on ne récupère pas encore les données dans la BDD, mais on observe quand même 4 lignes qui correspondent au nombre de personnages présent dans la table
        <br>On va donc aborder le sujet de la "théorie de l'hydratation".</p>
        
        <h3>La théorie de l'hydratation :</h3>
        <p>On va parler dans cette théorie d'"objet à hydrater", c'est-à-dire qu'on va lui apporter ce dont il a besoin pour fonctionner (autrement dit, lui fournir des données correspondant à ses attributs).</p>
        <img src="assets/images/410249.png" class="img-fluid" alt="">

        <h5>L'hydratation en pratique :</h5>
        <p>On va se servir d'une méthode/function</p>

<!-- ===================================================================== -->
<pre id="pre1"><code class="language-php">public function hydrate(array $donnees)
{
    foreach ($donnees as $key => $value)
    {
        $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
            $this->$method($value);
        }
    }
}</code></pre>
<!-- ===================================================================== -->

    
        <p><b><u>Le code va retourner ce résultat :</b></u></p>
        <?php
            require 'connexion_db.php';
                // On admet que $db est un objet PDO.
                $db = connexionBase();
                $request = $db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages');
                    
                while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
                {
                // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
                // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
                    $perso = new Personnage;
                    $perso->hydrate($donnees);
                    echo $perso->getNom(), ' a ', $perso->getForcePerso(), ' de force, ', $perso->getDegats(), ' de dégâts, ', $perso->getExperience(), ' d\'expérience et est au niveau ', $perso->getNiveau().'<br>';
                }
        ?>

        <br>
        <h3>Gérer sa base de données correctement :</h3>
        <p>En POO, "Une class, un rôle."
        <br>Par exemple, la class personnage a pour but d'instancier un objet personnage qui a 
        pour rôle de représenter une ligne présent en BDD.
        <br> Ce n'est donc pas dans cette class que l'on va gérer les ajouts,les modifications, les suppressions ou encore la récupération.
        <br> On va alors créer une nouvelle class qui jouera le rôle de manager ! </p>

        <h5>La class PersonnagesManager :</h5>
        <p>La question qu'il faudra se poser ici c'est :</p>
        <ul>
            <li>De quoi a besoin un manager pour fonctionner ?</li>
        </ul>
        <p>La répone étant :</p>
        <ul>
            <li>Seulement, et uniquement, d'une connexion à un BDD !</li>
        </ul>


<!-- ========================================================= -->
<pre id="pre4"><code class="language-php">class PersonnagesManager
{
    private $_db;
}</code></pre>
<!-- ===================================================================== -->


        <p>Quelles vont être ses différentes fonctionnalités ?
        <br> Elles vont correspondre au CRUD :</p>

        <ul>
            <li>Enregistrer une nouvelle entité</li>
            <li>Modifier une entité</li>
            <li>Supprimer une entité</li>
            <li>Sélectionner une entité</li>
        </ul>

        <p>Après avoir identifier les méthodes, il est consillé dans un premier de les détailler à l'aide d'un commentaire. 
        <br> Cela permet d'organiser plus facilement le code dans notre tête.</p>

<!-- ============================================================================================================================ -->
<pre><code class="language-php">class PersonnagesManager
{
    private $_db; // Instance de PDO.

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Personnage $perso)
    {
        // Préparation de la requête d'insertion.
        // Assignation des valeurs pour le nom, la force, les dégâts, l'expérience et le niveau du personnage.
        // Exécution de la requête.
    }

    public function delete(Personnage $perso)
    {
        // Exécute une requête de type DELETE.
    }

    public function get($id)
    {
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
    }

    public function getList()
    {
        // Retourne la liste de tous les personnages.
    }

    public function update(Personnage $perso)
    {
        // Prépare une requête de type UPDATE.
        // Assignation des valeurs à la requête.
        // Exécution de la requête.
    }

public function setDb(PDO $db)
{
    $this->_db = $db;
}
}</code></pre> 
        
        
        <p>Une fois fait, on peut alors remplacer les commentaires par les instructions.</p>

<!-- ============================================================================================================================ -->
<pre><code class="language-PHP">class PersonnagesManager
{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Personnage $perso)
    {
        $q = $this->_db->prepare('INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');

        $q->bindValue(':nom', $perso->nom());
        $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
        $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
        $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
        $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);

        $q->execute();
    }

    public function delete(Personnage $perso)
    {
        $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->getId());
    }

    public function get($id)
    {
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Personnage($donnees);
    }

    public function getList()
    {
        $persos = [];

        $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
        $persos[] = new Personnage($donnees);
        }

        return $persos;
    }

    public function update(Personnage $perso)
    {
        $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

        $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
        $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
        $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
        $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
        $q->bindValue(':id', $perso->getId(), PDO::PARAM_INT);

        $q->execute();
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}</code></pre>


        <?php
            class PersonnagesManager
            {
                private $_db; // Instance de PDO

                public function __construct($db)
                {
                    $this->setDb($db);
                }

                public function add(Personnage $perso)
                {
                    $q = $this->_db->prepare('INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');

                    $q->bindValue(':nom', $perso->getNom());
                    $q->bindValue(':forcePerso', $perso->getForcePerso(), PDO::PARAM_INT);
                    $q->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
                    $q->bindValue(':niveau', $perso->getNiveau(), PDO::PARAM_INT);
                    $q->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);

                    $q->execute();
                }

                public function delete(Personnage $perso)
                {
                    $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->getId());
                }

                public function get($id)
                {
                    $id = (int) $id;

                    $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE id = '.$id);
                    $donnees = $q->fetch(PDO::FETCH_ASSOC);

                    return new Personnage($donnees);
                }

                public function getList()
                {
                    $persos = [];

                    $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');

                    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
                    {
                    $persos[] = new Personnage($donnees);
                    }

                    return $persos;
                }

                public function update(Personnage $perso)
                {
                    $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

                    $q->bindValue(':forcePerso', $perso->getForcePerso(), PDO::PARAM_INT);
                    $q->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
                    $q->bindValue(':niveau', $perso->getNiveau(), PDO::PARAM_INT);
                    $q->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);
                    $q->bindValue(':id', $perso->getId(), PDO::PARAM_INT);

                    $q->execute();
                }

                public function setDb(PDO $db)
                {
                    $this->_db = $db;
                }
            }
        ?>

        <h3>Testons le code ! </h3>
        <p>Création d'un personnage :</p>

<!-- ========================================================================= -->
<pre id="pre1"><code class="language-php">$perso = new Personnage([
    'nom' => 'Victor',
    'forcePerso' => 5,
    'degats' => 0,
    'niveau' => 1,
    'experience' => 0
]);</code></pre>

        <?php
        // TODO: retourne des valeurs "NULL" dans le tableau, pourquoi?
        // $perso = new Personnage([
        //     'nom' => 'Victor',
        //     'forcePerso' => 5,
        //     'degats' => 0,
        //     'niveau' => 1,
        //     'experience' => 0
        // ]);
        $perso = new Personnage;
        
        $perso->hydrate(array(
            'nom' => 'Victor',
            'forcePerso' => 5,
            'degats' => 0,
            'niveau' => 1,
            'experience' => 0
        ));
        var_dump($perso);
        ?>

        <p>On va ensuite créer la connexion et instancier le manager :</p>

<!-- ========================================================================= -->
<pre id="pre2"><code class="language-php" >require 'connexion_db.php';
    $db = connexionBase();
    $manager = new PersonnagesManager($db);</code></pre>
    
        <?php
            $db = connexionBase();
            $manager = new PersonnagesManager($db);            
        ?>

        <p>Et enfin, on appellera la méthode que l'on souhaite appliquer. Ici "add()" :</p>
        
<!-- =============================================================================== -->
<pre id="pre3"><code class="language-php">$manager->add($perso);</code></pre>

        <?php
            // $manager->add($perso);
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/prism.js"></script>
</body>
</html>
