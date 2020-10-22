<!-- Début du collapse -->
<div id="accordion">

    <!-- Collapse 5 : La commande IF -->
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Commande <b>IF</b>
                </button>
            </h5>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <p> La commande suivante vérifie si la variable « session_count » est supérieure à 0, si c'est le cas elle retourne vrai, sinon elle retourne faux</p>
                <pre class="pre"><code class="language-SQL">IF session_count > 0 THEN 
-- session_count renvoit au SELECT effectué dans la partie 3. Attribuer le résultat ...
    SELECT 1;
ELSE
    SELECT 0;
END IF;</code></pre>
            </div><!-- fin card-body -->
        </div>
    </div>

    <!-- Collapse 5 : La commande CASE -->
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Commande <b>CASE</b>
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <p>Voici un switch case qui essaie d'attraper une variable nommée « catchme » basée sur ses conditions. Le cas par défaut doit être appelé, 
                    car « catchme » ne correspond à aucune des conditions définies dans le switch case. </p>
                <pre class="pre"><code class="language-SQL">DECLARE catchme INTEGER DEFAULT 10; 

CASE catchme 
    WHEN 2 THEN SET catchme = catchme + 2; 
    WHEN 5 THEN SET catchme = catchme + 5; 
    ELSE 
        SET catchme = 50; 
END CASE</code></pre>
            </div><!-- fin card-body -->
        </div>
    </div>

    <!-- Collapse 5 : La boucle WHILE -->
    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Boucle <b>WHILE</b>
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <p>Quand vous définissez une boucle while vous pouvez lui donner un label qui peut être utilisé par plusieurs commandes pour contrôler la boucle. 
                    Le label vient avant la définition de la boucle while et après la fin de la boucle. 
                    L'exemple simple suivant crée une boucle WHILE appelée « iterwhile » qui s'itère tant que la variable « iter » est inférieure à 9. </p>
                <pre class="pre"><code class="language-SQL">DECLARE iter INTEGER DEFAULT 0; 

iterwhile: WHILE iter < 9 DO 
    SET iter = iter + 1; 
END WHILE iterwhile;</code></pre>
            </div><!-- fin card-body -->
        </div>
    </div>

    <!-- Collapse 4 : La boucle LOOP -->
    <div class="card">
        <div class="card-header" id="headingFour">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Boucle <b>LOOP</b>
                </button>
            </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
            <p> Elle boucle indéfiniment jusqu'à ce que vous lui demandiez d'arrêter avec la commande LEAVE
                Elle est appelée « iterloop » et fait la même chose que l'exemple WHILE précédent, 
                mais utilise une commande IF et une commande LEAVE pour s'arrêter. 
                </p>
                <pre class="pre"><code class="language-SQL">DECLARE iter INTEGER DEFAULT 0; 

iterloop: LOOP 
    IF iter < 9 THEN 
        SET iter = iter + 1; 
    ELSE 
        LEAVE iterloop; 
    END IF; 
END LOOP iterloop;</code></pre>            
            </div> <!-- fin card-body -->
        </div>
    </div>

    <!-- Collapse 5 : La boucle REPEAT -->
    <div class="card">
        <div class="card-header" id="headingFive">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Boucle <b>REPEAT</b>
                </button>
            </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">
                <p>La boucle REAPEAT sera exécutée au moins une fois, à l'inverse de la boucle WHILE, 
                        puisqu'elle vérifie si les conditions correspondent à la fin de chaque itération. </p>
                    <pre class="pre"><code class="language-SQL">DECLARE iter INTEGER DEFAULT 0; 

iterrepeat: REPEAT 
    SET iter = iter + 1; 
UNTIL iter < 9 
END REPEAT iterrepeat;</code></pre>
            </div><!-- fin card-body -->
        </div>
    </div>

    <!-- Collapse 6 : Les commandes LEAVE et ITERATE -->
    <div class="card">
        <div class="card-header" id="headingSix">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Commandes <b>LEAVE</b> et <b>ITERATE</b>
                </button>
            </h5>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
            <div class="card-body">
                <p>Ces commandes LEAVE et ITERATE sont similaires aux commandes break et continue utilisées dans d'autres langages de programmation.
                Elles peuvent être appliquées à n'importe quelle boucle WHILE, LOOP ou REPEAT.
                </p>
                <pre class="pre"><code class="language-SQL">DECLARE iter INTEGER DEFAULT 0; 

testloop: LOOP 
    IF iter = 10 THEN 
        SET iter = iter + 12; 
        ITERATE testloop; 
    END IF; 
    IF iter > 126 THEN 
        LEAVE testloop; 
    END IF; 
    SET iter = iter + 1; 
END LOOP testloop;</code></pre>
            </div><!-- fin card-body -->
        </div>
    </div>
</div> <!-- Fin collapse -->