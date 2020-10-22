<?php
include 'header.php';
?>
<!-- HEADER -->
<header>
    <div class="card mb-3 border border-danger">
        <img class="card-img-top p-1 bg-danger" src="assets/images/img_card.jpg" alt="Card image cap">
        <div class="card-body text-center border border-danger">
            <h3 class="card-title"><b>Les procédures stockées</b></h3>
            <p class="card-text">
                <blockquote class="blockquote">
                    <p class="mb-0"><i>"En informatique, dans la technologie des bases de données, une procédure stockée (ou stored procedure en anglais) est un ensemble d'instructions SQL précompilées, stockées dans une base de données et exécutées sur demande par le SGBD qui manipule la base de données."</i></p>
                    <footer class="blockquote-footer"><cite title="Source Title"><a href="https://fr.wikipedia.org/wiki/Proc%C3%A9dure_stock%C3%A9e">Wikipedia</a></cite></footer>
                </blockquote>
                <div class="alert alert-danger text-left" role="alert">
                    <p>A noter qu'elles peuvent réduire le trafic réseau ainsi que le nombre d'appels à votre base de données significativement !</p>
                    <p>Contrairement aux requêtes préparées, elles ne dépendent pas d'un thread et ne sont pas détruites automatiquement ; de même, elles restent présentes si le serveur s'arrête.</p>
                </div>
            </p>
        </div>
    </div><!-- Fin card -->
</header>
<!-- MAIN -->
<main>
    <!-- Début des cards -->
    <div class="card-columns">

        <!-- Card : Les paramètres -->
        <div class="card bg-danger">
            <div class="card-body">
                <h5 class="card-title bg-light p-3"><b>1. Les paramètres de la procédure stockée :</b></h5>
                <p class="card-text text-light">
                    On va retrouver trois éléments :
                    <!-- Navigateur  -->
                    <?php include 'navsParameters.php'; ?>
                </p>
            </div>
        </div><!-- Fin Card : Les paramètres -->

        <!-- Card : citation 2b -->
        <div class="card p-3  border border-danger">
            <div class="row">
                <div class="col-8 pr-0">
                    <blockquote class="blockquote mb-0 card-body pr-0 py-2">
                        <h6>(2b || ! 2b) ? thatIsTheQuestion() : thatIsNotTheQuestion()</h6>
                        <footer class="blockquote-footer">
                            <small class="text-muted">
                                Damien
                            </small>
                        </footer>
                    </blockquote>
                </div>
                <div class="col-4 pl-0">
                    <img src="assets/images/2b.png" alt="">
                </div>
            </div>
        </div><!-- Fin Card : citation 2b -->

        <!-- Card : déclaration de variables  -->
        <div class="card bg-danger">
            <div class="card-body ">
                <h5 class="card-title p-2 bg-light"><b>2. Déclarer et configurer des variables dans les procédures stockées</b></h5>
                <p class="card-text">
                    <h6 class="text-light">Exemple de déclaration avec la commande <b>DECLARE</b> :</h6>
                    <pre id="pre"><code class="language-SQL">DECLARE session_count INTEGER; 
DECLARE session_id VARCHAR(32); 
DECLARE session_content TEXT;</code></pre>
                    <h6 class="text-light">Exemple de configuration avec la commande <b>SET</b> :</h6>
                    <pre id="pre"><code class="language-SQL">SET session_count = 1; 
SET session_id = '699d571326815e40b8e1ae99af04563c'; 
SET session_content = 'Du contenu de session ici';</code></pre>
                    <h6 class="text-light">Si l'on connait la valeur au moment de les déclarer, on peut utiliser la commande <b>DECLARE</b> :</h6>
                    <pre class="pre"><code class="language-SQL">DECLARE session_count INTEGER DEFAULT 1; 
DECLARE session_id VARCHAR(32) DEFAULT '699d571326815e40b8e1ae99af04563c'; 
DECLARE session_content TEXT DEFAULT ''Du contenu de session ici;</code></pre>
                </p>
            </div>
        </div><!-- Fin Card : déclaration de variables -->

        <!-- Card : image   -->
        <div class="card border border-danger">
            <img class="card-img" src="assets/images/meme2.jpg" alt="Card image">
        </div><!-- Fin Card : image -->

        <!-- Card : attribution valeur aux variables  -->
        <div class="card bg-danger">
            <div class="card-body">
                <h5 class="card-title bg-light p-2"><b>3. Attribuer le résultat du <span class="text-primary">SELECT</span> a une variable :</b></h5>
                <p class="card-text">
                    <pre class="pre"><code class="language-SQL">DECLARE session_count INTEGER; 

SELECT COUNT(*) 
-- Avec INTO on attribut le résultat du SELECT à la variable
INTO session_count 
FROM `tblSessions`;</code></pre>
                </p>
                <h6 class="text-light">On peut également le faire dans plusieurs variables :</h6>
                <pre class="pre"><code class="language-SQL">DECLARE user VARCHAR(15); 
DECLARE pass VARCHAR(32); 

SELECT `strUserName`, `strPassword` 
INTO user, pass 
FROM `tblUsers` 
LIMIT 0, 1;</code></pre>
            </div>
        </div><!-- Fin Card : attribution valeur aux variables -->

        <!-- Card : image  -->
        <div class="card border border-danger">
            <img class="card-img" src="assets/images/meme1.jpg" alt="Card image">
        </div><!-- Fin Card : image -->

        <!-- Card : citation Toc toc toc  -->
        <div class="card text-dark text-center p-3 border border-danger">
            <blockquote class="blockquote mb-0">
                <p>
                    Toc Toc Toc <br>
                    Qui est là ?<br>
                    *Très longue pause*<br>
                    C'est Internet Explorer
                </p>
            </blockquote>
        </div><!-- Fin Card : citation Toc toc toc -->

        <!-- Card : Controler les flux  -->
        <div class="card bg-danger">
            <div class="card-body">
                <h5 class="card-title bg-light p-2"><b>4. Contrôler le flux de votre procédure stockée :</b></h5>
                <p class="card-text">
                    <p class="text-light">Voici des exemples d'utilisation des procédures stockées :</p>
                    <?php include 'accordionFlux.php'; ?>
                </p> <!-- Fin Card-text -->
            </div>
        </div><!-- Fin Card : Controler les flux -->

        <!-- Card : image -->
        <div class="card border border-danger">
            <img class="card-img" src="assets/images/shiba2.jpg" alt="Card image">
        </div><!-- Fin Card : image -->

        <!-- Card : citation  -->
        <div class="card p-3 text-center border border-danger">
            <blockquote class="blockquote mb-0">
                <p>J’ai un String dans l’Array()</p>
                <footer class="blockquote-footer">
                    <small class="text-muted">
                        Unknown
                    </small>
                </footer>
            </blockquote>
        </div><!-- Fin Card : citation -->

        <!-- Card : image -->
        <div class="card border border-danger">
            <img class="card-img" src="assets/images/meme3.PNG" alt="Card image">
        </div><!-- Fin Card : image -->

        <!-- Card : Blocs d'instruction  -->
        <div class="card bg-danger">
            <div class="card-body ">
                <h5 class="card-title p-2 bg-light"><b>5. Les blocs d'instructions :</b></h5>
                <p class="card-text">
                    <p class=" text-light">On peut attribuer un nom au bloc à fermer :</p>
                    <pre id="pre"><code class="language-SQL">sdz_label: BEGIN
    # ici les instructions
END sdz_label;</code></pre>

                    <p class="text-light">
                        Il faut savoir qu'une variable, dans un bloc, à une durée de vie et une visibilité:
                        <ul class="text-light">
                            <li>Durée de vie: la variable existe de sa déclaration jusqu'à la fin du bloc la contenant.</li>
                            <li>Visibilité : espace où la variable peut être utilisée. La variable est visible jusqu'à la fin du bloc et passe invisible dès qu'un nouveau bloc commence et ce, jusqu'à ce que le dit bloc se finisse.</li>
                        </ul>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger bg-light" data-toggle="modal" data-target="#variableBloc">Voir l'exemple</button>

                        <!-- Modal -->
                        <div class="modal fade" id="variableBloc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img class="img-fluid" src="assets/images/bloc_variables.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </p> <!-- Fin card-text -->
            </div>
        </div> <!-- Fin Card : déclaration de variables -->

        <!-- TODO: Changer la citation -->
        <!-- Card : citation  -->
        <div class="card p-3 text-center border border-danger">
            <blockquote class="blockquote mb-0">
                <p>Un développeur ne descend pas du métro.</p>
                <footer class="blockquote-footer">
                    <small class="text-muted">
                        Il libère la RAM...
                    </small>
                </footer>
            </blockquote>
        </div><!-- Fin Card : citation -->

        <!-- Card : Gestionnaire  -->
        <div class="card bg-danger">
            <div class="card-body ">
                <h5 class="card-title p-2 bg-light"><b>6. Les Gestionnaires :</b></h5>
                <p class="card-text">
                    <p class="text-light">
                        Un gestionnaire permet de continuer l'exécution d'une procédure si une erreur apparait comme dans l'exemple suivant.
                        <p class="text-light">La syntaxe :</p>
                    </p>
                    <pre class="pre"><code class="language-SQL">DECLARE type_gestionnaire HANDLER FOR condition_valeur requete;</code></pre>
                    <?php include 'navsGestionnaire.php'; ?>

                </p> <!-- Fin card-text -->
            </div>
        </div> <!-- Fin Card : Gestionnaire -->

        <!-- Card : image -->
        <div class="card border border-danger">
            <img class="card-img" src="assets/images/meme.jpg" alt="Card image">
        </div><!-- Fin Card : image -->

        <!-- Card : citation  -->
        <div class="card p-3 text-center border border-danger">
            <blockquote class="blockquote mb-0 mt-3">
                <p>.titanic{float:none;}
                    <img src="assets/images/titanic.png" alt="">
                </p>
            </blockquote>
        </div><!-- Fin Card : citation -->

        <!-- Card : Curseurs  -->
        <div class="card bg-danger">
            <div class="card-body ">
                <h5 class="card-title p-2 bg-light"><b>7. Les curseurs :</b></h5>
                <p class="card-text">
                    <?php include 'curseurs.php'; ?>
                </p> <!-- Fin card-text -->
            </div>
        </div> <!-- Fin Card : Gestionnaire -->

        <!-- Card : image -->
        <div class="card border border-danger">
            <img class="card-img" src="assets/images/meme4.jpg" alt="Card image">
        </div><!-- Fin Card : image -->

    </div> <!-- Fin des colonnes de cards -->

    <div class="alert alert-danger text-center" id="sources" role="alert">
        <div class="row d-flex justify-content-center">
            <img src="assets/images/shiba1.png" alt="">
            <div class=" text-center">
                Sources : 
                <ul class="p-0">
                    <li><a href="http://sdz.tdct.org/sdz/rocedure-stockee.html" target="_blank">Tutoriel : Procédure stockée</a></li>
                    <li><a href="https://jcrozier.developpez.com/tutoriels/web/php/utilisation-avancee-procedures-stockees-mysql/" target="_blank">Utilisation avancée des procédures stockées MySQL</a></li>
                </ul>

            </div>
            <img src="assets/images/shiba1r.png" alt="">            
        </div>

    </div>
</main>
<?php
include 'footer.php';
?>