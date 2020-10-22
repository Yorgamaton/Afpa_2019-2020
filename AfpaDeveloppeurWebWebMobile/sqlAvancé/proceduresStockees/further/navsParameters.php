<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active text-light bg-danger border-bottom" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Le sens</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light bg-danger border-bottom" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Le nom</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light bg-danger border-bottom" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Le type</a>
    </li>
</ul>
<div class="tab-content bg-light" id="myTabContent">
    <div class="tab-pane fade show active p-3" id="home" role="tabpanel" aria-labelledby="home-tab">
        Il peut prendre trois valeurs :
        <ul>
            <li>IN : Le paramètre sera une valeur ou une variable d'entrée envoyé lors de l'appel et qui sera utilisé à l'intérieur de la procédure.</li>
            <li>OUT : Le paramètre sera une variable (de session ou de procédure) de sortie qui prendra une valeur lors de la procédure.</li>
            <li>INOUT : Le paramètre sera une variable d'entrée-sortie qui pourra être utilisé ou non dans la procédure et vera sa valeur modifiée lors de la procédure.</li>
        </ul>
    </div>
    <div class="tab-pane fade p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        Le nom suit les règles de nommage habituel : représentera une variable dans la procédure qui aura pour valeur celle qu'on lui aura assigné.
    </div>
    <div class="tab-pane fade p-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        Prend en valeur le type de la valeur ou dela variable attendu (Ex: INT, VARCHAR(20), etc.)
    </div>
</div>



<p class="text-light mt-3">Exemples : </p>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active text-light bg-danger border-bottom" id="home-tab" data-toggle="tab" href="#IN" role="tab" aria-controls="home" aria-selected="true">IN</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light bg-danger border-bottom" id="profile-tab" data-toggle="tab" href="#OUT" role="tab" aria-controls="profile" aria-selected="false">OUT</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link text-light bg-danger border-bottom" id="contact-tab" data-toggle="tab" href="#INOUT" role="tab" aria-controls="contact" aria-selected="false">INOUT</a>
    </li> -->
</ul>
<div class="tab-content bg-light" id="myTabContent">
    <div class="tab-pane fade show active p-3" id="IN" role="tabpanel" aria-labelledby="home-tab">
    <pre class="pre"><code class="language-SQL">DELIMITER |
CREATE PROCEDURE sdz(IN valeur VARCHAR(20))
BEGIN
    SELECT valeur;
END|

DELIMITER ;

-- On appelle la procédure : 
CALL sdz(2);
-- Cela va nous retourner la valeur "2"
    </code></pre>

    </div>
    <div class="tab-pane fade p-3" id="OUT" role="tabpanel" aria-labelledby="profile-tab">
        <pre class="pre"><code class="language-SQL">DELIMITER |

CREATE PROCEDURE carre(IN valeur INT, OUT toto BIGINT)
BEGIN
    SELECT valeur*valeur INTO toto;
END|

DELIMITER ;

-- On appelle la procédure : 
-- On demande de calculer le carré de 2 en passant 2 à la valeur d'entrée, 
-- et on indique la variable '@b' qui stockera le résultat pour la sortie
CALL carre(2,@b);

SELECT @b;
-- Cela va nous retourner la valeur "4"

</code></pre>
    </div>
    <!-- <div class="tab-pane fade p-3" id="INOUT" role="tabpanel" aria-labelledby="contact-tab">
        Prend en valeur le type de la valeur ou dela variable attendu (Ex: INT, VARCHAR(20), etc.)
    </div> -->
</div>