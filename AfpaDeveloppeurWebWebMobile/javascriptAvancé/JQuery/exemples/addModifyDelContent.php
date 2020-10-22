<div class="wrapperAddModifyDelContent">

    <div class="box1d">
        <h3>Ajouter/modifier du contenu </h3>
        <p>Jquery propose différentes fonctions pour ajouter, modifier ou supprimer du contenu HTML :</p>

        <div class="wrapperAddModifyDelContent2">
            <!-- box1 -->
            
            <!-- Fin box2 -->
            <div class="box2d">
                <h3>1 - Récupérer ou changer un texte <a href="https://api.jquery.com/text/" target="_blank">Documentation</a></h3>
                <p>Pour cela, on va utiliser la méthode <span class="highlight">text()</span>.</p>
                <pre><code class="language-JS">// Au clic sur l'élément #lien
$("#lien").click(function() 
{
   // On récupère le texte de div1  
    var letexte = $("#div1").text();     

   // Changer le texte (ici, copie le texte de div1 dans div2) :    
    $("#div2").text(letexte);                        
}); </code></pre>
            </div><!-- box2 -->
            
            <!-- box3 -->
            <div class="box3d">
                <h3>2- Ajouter ou remplacer du code HTML <a href="https://api.jquery.com/html/">Documentation</a></h3>
                <p>Ici on utilisera la fonction <span class="highlight">html()</span>(équivalent de <span class="highlight">innerHtml</span> du JS classique)</p>
                <pre><code class="language-JS">// Modifie le contenu (innerHTML) de l'élément #div1
$('#div1').html("<h1>Hello world!</h1>");</code></pre>

                <h3>Autres méthodes : <a href="https://www.pierre-giraud.com/jquery-apprendre-cours/inserer-deplacer-element-dom/">Documentation</a></h3>
            </div><!-- Fin box3 -->
                
        </div>
    </div><!-- Fin box1 -->
</div>