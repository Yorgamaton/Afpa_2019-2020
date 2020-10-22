<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active text-light bg-danger border-bottom" id="home-tab" data-toggle="tab" href="#Type_gestionnaire" role="tab" aria-controls="home" aria-selected="true">Type_gestionnaire</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light bg-danger border-bottom" id="profile-tab" data-toggle="tab" href="#Condition_valeur" role="tab" aria-controls="profile" aria-selected="false">Condition_valeur</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link text-light bg-danger border-bottom" id="contact-tab" data-toggle="tab" href="#INOUT" role="tab" aria-controls="contact" aria-selected="false">INOUT</a>
    </li> -->
</ul>

<div class="tab-content bg-light" id="myTabContent">
    <!-- Type de gestionnaire -->
    <div class="tab-pane fade show active p-3" id="Type_gestionnaire" role="tabpanel" aria-labelledby="home-tab">
        Peut prendre 2 valeurs :
        <div class="d-flex justify-content-around mt-2">
            <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Lors de la rencontre d'une erreur, la procédure s'arrête (comportement par défaut)">
                Exit
            </button>
            <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Lors de la rencontre d'une erreur, la procédure continue.">
                Continue
            </button>
        </div>
    </div><!-- Fin Type de gestionnaire -->

    <!-- Condition de valeur -->
    <div class="tab-pane fade p-3" id="Condition_valeur" role="tabpanel" aria-labelledby="profile-tab">
        <p>Il existe plusieurs conditions possibles dont certaines repprennt un code d'erreur standard à SQL, d'autres du standard de MySQL.</p>
        Peut prendre 4 valeurs :
        <div class="row">
            <div class="col-12 d-flex justify-content-around mt-2">
                <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="En spécifiant le code de l'erreur qui sera mis entre simple quote comme dans l'exemple en dessous.">
                    SQLSTATE
                </button>
                <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Raccourci pour tous les codes SQLSTATE qui commencent par 01.">
                    SQLWARNING
                </button>
            </div>
            <div class="col-12 d-flex justify-content-around mt-2">
                <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Raccourci pour tous les codes SQLSTATE qui commencent par 02.">
                    NOT FOUND
                </button>
                <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Taccourci pour tous les codes SQLSTATE qui ne sont pas représentés par SQLWARNING ou par NOT FOUND.">
                    SQLEXCEPTION 
                </button>
            </div>
        </div>
    </div><!-- Fin Condition de valeur -->

    <!-- <div class="tab-pane fade p-3" id="INOUT" role="tabpanel" aria-labelledby="contact-tab">
        Prend en valeur le type de la valeur ou dela variable attendu (Ex: INT, VARCHAR(20), etc.)
    </div> -->
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger bg-light my-2" data-toggle="modal" data-target="#gestionnaire">Voir l'exemple</button>

<!-- Modal -->
<div class="modal fade" id="gestionnaire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <pre id="pre"><code class="language-SQL">DELIMITER |
CREATE TABLE t (s1 int,PRIMARY KEY (s1))|
CREATE PROCEDURE erreur_continue ()
BEGIN
    /* On déclare le  gestionnaire
    (A noter que l'on peut mettre plusieurs codes d'erreurs) */
    DECLARE CONTINUE HANDLER FOR SQLSTATE '1062', SQLEXCEPTION SELECT 'ERREUR';
    SELECT 'je suis 1';
    INSERT INTO t VALUES (1);
    SELECT 'je suis 2';
    /* Une erreur aurait du se produire avec le INSERT suivant 
    et aurait arrêté la procédure */
    INSERT INTO t VALUES (1);
    SELECT 'je suis 3';
END|

DELIMITER ;</code></pre>
            </div>
        </div>
    </div>
</div> <!-- Fin Modal -->

<p class="text-light">Noter que vous pouvez également nommer les gestionnaires. La syntaxe est la suivante :</p>
<pre class="pre"><code class="language-SQL">DECLARE nom_type_erreur CONDITION FOR type_erreur;</code></pre>

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger bg-light my-2" data-toggle="modal" data-target="#gestionnaireNom">Voir l'exemple</button>

<!-- Modal -->
<div class="modal fade" id="gestionnaireNom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <pre id="pre"><code class="language-SQL">DELIMITER |
CREATE TABLE t (s1 int,PRIMARY KEY (s1))|
CREATE PROCEDURE condition_propre ()
BEGIN
    /* ici on nomme le gesionnaire ce qui permet de s'en reservir plus tard 
    (attention à la visibilité et durée de vie de la variable cf. 5. Les blocs d'instructions) */
    DECLARE condition_cle_duplique CONDITION FOR SQLSTATE '23000';
    DECLARE CONTINUE HANDLER FOR condition_cle_duplique SELECT 'ERREUR';
    SELECT 'je suis 1';
    INSERT INTO t VALUES (1);
    SELECT 'je suis 2';
    INSERT INTO t VALUES (1);
    SELECT 'je suis 3';
END|

DELIMITER ;</code></pre>
            </div>
        </div>
    </div>
</div> <!-- Fin Modal -->
<p class="text-center mt-3">
    <a href="https://dev.mysql.com/doc/refman/8.0/en/error-handling.html"  target="_blank" class="text-light">
        <img src="assets/images/error.png" alt="">
        La liste des erreurs !
        <img src="assets/images/error.png" alt="">
    </a>
</p>
