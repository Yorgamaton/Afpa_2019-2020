<!-- wrapperManip -->
<div class="wrapperManip">

    <!-- box1 -->
    <div class="box1c">
    <h3>Manipuler de l'objet sélectionné : </h3>
        <p>Tout élément sélectionné est définit comme un objet avec l'ensemble des propritétés et méthodes qui lui sont attachés.
            L'objet peut donc être réprésenté par le mot-clé <span class="highlight">this</span> qui sela lui-même utilisé comme sélecteur :
        </p>
        <pre><code class="language-JS">// HTML
<div id="one">Le développeur logiciel est un scribe informatique. Sa mission : concevoir et tester des sites de contenu, d'e-commerce ou applications.</div>

// JS
$("#one").mouseover(function() 
{     
// Au passage de la souris, récupère le texte de l'élément #one 
// et le stocke dans la variable a
var a = $(this).text(); 

alert(a);        
});</code></pre>

        <!-- wrapperManip2 -->
        <div class="wrapperManip2">

            <!-- Fin box2 -->
            <div class="box2c">
                <h3>1 - Manipuler les instrcutions CSS : <a href="https://api.jquery.com/css/" target="_blank">Documentation</a></h3>
                <p>On va pouvoir manipuler les propriétés CSS à l'aide de la fonction <span class="highlight">css()</span> :</p>
                <pre><code class="language-JS">// Au passage de la souris, applique la couleur rouge au texte de l'élément #one 
$("#one").mouseover(function() 
{
    $(this).css("color", "red");         
}); </code></pre>
                <p>A noter qu'il est possible de modifier plusieurs propriétés à la fois (Faire attention à la syntaxe) :</p>
                <pre><code class="language-JS">$("#one").mouseover(function() 
{
    $(this).css({
                "border" : "1px solid red",
                "font-weight" : "bold",
                "cursor" : "help"
                });         
}); </code></pre>
            <p>Et enfin, on peut récupérer la valeur d'une propriété CSS en l'associant à une variable :</p>
            <pre><code class="language-JS">$("#one").mouseover(function() 
{   
    var a = $(this).css("background-color);

   // Affiche, par exemple, rgba(0, 0, 255) si fond rouge 
    alert(a);      
}); </code></pre>
            </div><!-- box2 -->
        
            <!-- box3 -->
            <div class="box3c">
                <h3>2 - Modifier la hauteur/largeur d'un élément HTML</h3>
                <p>
                    Pour ce faire, on va utiliser les méthodes 
                    <span class="highlight"><a href="https://api.jquery.com/height/" target="_blank">height()</a></span> 
                    et <span class="highlight"><a href="https://api.jquery.com/width/" target="_blank">width()</a></span> 
                </p>
                <pre><code class="language-JS">$("#one").click(function() 
{
   // Récupère la hauteur de #p1 et le stocke dans la variable h
    var h = $(this).height();     

   // Si on passe une valeur, l'élément HTML est modifié en conséquence
   // Ici, la hauteur sera modifié à 500 pixels 
    $(this).height(500);
}); </code></pre>
            </div><!-- Fin box3 -->
        
            <!-- box4 -->
            <div class="box4c">
                <h3>3 - Ajouter ou supprimer une classe</h3>
                <p>
                    Pour ajouter une class, on va utilise la méthode 
                    <span class="highlight"><a href="https://api.jquery.com/addclass/" target="_blank">addClass()</a></span>
                    alors que pour la suppression on utilisera la méthode
                    <span class="highlight"><a href="https://api.jquery.com/removeclass/" target="_blank">removeClass()</a></span>
                </p>
                <div class="alert">
                    <p>Pour <span class="highlight">addClass()</span>, la classe doit être définie préalablement dans la feuille de styles.</p>
                </div>
            </div><!-- Fin box4 -->
        </div> <!-- Fin wrapperManip2 -->
    </div><!-- Fin box1 -->

</div><!-- Fin wrapperManip -->


