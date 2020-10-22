<div class="wrapperSelector">

    <!-- box 1 -->
    <div class="box1">
        <p>
            Premier test de JQuery qui permet d'afficher une alert lors du clic sur le bouton :
            <input type="button" id="bouton" value="bouton">
            <br><br>
            code JS du bouton :
        </p>
        <pre><code class="language-JS">$(document).ready(function() // initialise l'utilisation de JQuery au chargement de la page. Un seul $(document).ready nécessaire par script Jquery.
{
$("#bouton").click(function() 
// $("#bouton") : le sélecteur, qui cible l’élément passé en argument (ici l'input de type button dont l'attribut id est nommée bouton) 
// .click : l'évènement, sur lequel on déclenchera le code contenu dans la fonction (ici affichage d'une boîte d'alerte). 
// Le code Javascript de la fonction est celui que vous allez écrire : il va contenir à la fois du Javascript « normal » et du code spécifique à JQuery (fonctions etc.). 
{
alert("Pierre qui roule n'amasse pas mousse !");
});
});</code></pre>
        <p class="alert">
            Attention, si vous utilisez Bootstrap dans votre page HTML, vous chargez déjà jQuery (mais dans une
            version allégée slim qui ne comprend pas toutes les fonctionnalités).
        </p>

    </div> <!-- fin box 1 -->

    <!-- box 2 -->
    <div class="box2">
        <h3>Les sélecteurs : </h3>
        <p>Il consiste à sélectionner un élément de la page web que l'on souhaite manipuler (balise HTML, attribut ou
            classe CSS).
            Un sélecteur commence par un <span class="highlight"><b>"$"</b></span>
            ( ce qui équivaut a <span class="highlight">document.getElementBy...</span> et <span
                class="highlight">document.querySelector...</span> )
        </p>
        <pre><code class="language-JS">$(selecteur).evenement</code></pre>

        <div class="wrapperSelector2">
    <!-- box 3 -->
    <div class="box3">
        <h4>1 - Sélection d'un élément HTML avec identifiant :</h4>
        <p>Dans l'exemple précédepent, il y a deux sélecteurs.<br>
            celui-ci renvoit a la page web en elle même :</p>
        <pre><code class="language-JS">$(document).ready</code></pre>

        <p>Quant à celui là, il va aller chercher l'id du bouton :</p>
        <pre><code class="language-JS">$("#bouton").click</code></pre>


    </div><!-- box 3 -->

    <!-- box 4 -->
    <div class="box4">
        <h4>2 - Sélection d'une classe CSS :</h4>
        <pre><code class="language-JS">$(".noir").evenement</code></pre>
        <span class="noir">Cliqué sur ce texte, il va devenir noir !</span>

    </div><!-- box 4 -->

    <!-- box 5 -->
    <div class="box5">
        <h4>3 - Sélection d'une balise HTML :</h4>
        <pre><code class="language-JS"> $("p").evenement</code></pre>
        <p class="alert">Faire attention car ça modifie l'ensemble des balises présentes dans le code !</p>
    </div><!-- box 5 -->

    <!-- box 6 -->
    <div class="box6">
        <h4>4 - Sélection multiple :</h4>
        <p>Cela permet d'éviter de répéter le code sur plusieurs éléments :</p>
        <pre><code class="language-JS">// Plusieurs ID
$("#panneau1, #panneau2, #panneau3").evenement

// Plusieurs classes
$(".rouge, .gras .noir").evenement

// Plusieurs balises HTML
$("p, div footer").evenement</code></pre>
        <p>A noter qu'il est possible de mixer les balises, identifiants et classes :</p>
        <pre><code class="language-JS">$("div, #panneau1, .rouge").evenement</code></pre>

    </div>
    <!--Fin box 6 -->

    <!-- box 7 -->
    <div class="box7">
        <h4>5 - Sélection descendante :</h4>
        <p>Le sélecteur peut permettre d'atteindre les enfants d'un élément dans la hiréarchie D.O.M.</p>
        <pre><code class="language-JS">// HTML
<ul id="liste">
<li>Amiens</li>
<li>Paris</li>   
<li>Lille</li>
</ul>

// Javascript/Jquery
// Sélectionne les enfants de l'élément #liste et met leur texte en rouge
$("#liste li").css("color", "red");</code></pre>
    </div><!-- Fin box 7 -->

    <!-- box 8 -->
    <div class="box8">
        <h4>6 - Sélection d'éléments « commençant par » :</h4>
        <p>Un sélecteur peut permettre de sélectionner l'ensemble des éléments dont les valeurs des attributs <span
                class="highlight">id</span> ou <span class="highlight">class</span> qui commence de la même façon.
            Pour cela, il faut utilise le signe <span class="highlight">^</span> :</p>
        <pre><code class="language-JS">// HTML
<ul>
<li id="listeA">Amiens</li>
<li id="listeB">Paris</li>   
<li id="listeC">Lille</li>
</ul>

// JS
$("[id^='liste']").css("color", "red");</code></pre>
    </div><!-- Fin box 8 -->

    <!-- box 9 -->
    <div class="box9">
        <h4>7 - Sélection d'éléments « finissant par » :</h4>
        <p>Un sélecteur peut permetre de sélectionner l'ensemble des élements dont les valeurs des attributs <span
                class="highlight">id</span> ou <span class="highlight">class</span> qui finissent de la même façon.
            Pour cela, il faut utiliser le signe <span class="highlight">$</span> :
        </p>
        <pre><code class="language-JS">// HTML
<ul>
<li id="Aliste">Amiens</li>
<li id="Bliste">Paris</li>   
<li id="Cliste">Lille</li>
</ul>

// JS
$("[id$='liste']").css("color", "red");</code></pre>
    </div><!-- Fin box 9 -->

    <!-- box 10 -->
    <div class="box10">
        <h4>8 - Sélection d'un attribut :</h4>
        <p>On peut cibler un attribut, cela se fait avec la méthode attr() : </p>
        <pre><code class="language-JS">// HTML
<a id="monLien" href="index.html" title="Page d'accueil">Accueil</a>    

// JS
// Accède à l'attribut href de l'id 'monLien'
// la variable 'valeur' vaudra 'index.html'
var valeur = $("#monLien").attr("href"); </code></pre>
    </div><!-- Fin box 10 -->

    <!-- box 11 -->
    <div class="box11">
        <h4>9 - Autres sélecteurs :</h4>
        <p>Il existe d'autres sélecteurs ou fonctions dont voici la <a
                href="https://api.jquery.com/category/selectors/">list</a>.</p>
    </div><!-- Fin box 11 -->

        </div>


    </div> <!-- fin box 2 -->
</div>