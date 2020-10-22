<div class="wrapperEffets">

    <!-- box1 -->
    <div class="box1f">
        <h3>Effets</h3>
        <div class="wrapperEffets2">
            
            <!-- box2 -->
            <div class="box2f">
                <h3>1 - Afficher, cacher ou inverser un élément</h3>
                <p>Pour cela, on va utiliser les méthodes <span class="highlight"><a href="https://api.jquery.com/show/" target="_blank">show()</a> </span>
                , <span class="highlight"><a href="https://api.jquery.com/hide/" target="_blank">hide()</a> </span> 
                et <span class="highlight"><a href="https://api.jquery.com/toggle/" target="_blank">toggle()</a> </span>.</p>
                <pre><code class="language-JS">// Affiche (fait apparaître) l'élément div1
$('#div1').show();

// Cache l'élément div1
$('#div1').hide();

/* Inverse l'état actuel de visibilité de div1 :
* Si visible, toggle() applique hide(),
* Si caché, toggle() applique show()  
*/ 
$('#div1').toggle();</code></pre>
            </div><!-- Fin box2 -->
            
            <!-- box3 -->
            <div class="box3f">
                <h3>2- Autres fonctions d'effet</h3>
                <ul>
                    <li>
                        Afficher, cacher ou inverser un élément avec l'effet <b>fade</b> :
                        <span class="highlight"><a href="https://api.jquery.com/fadeIn/">fadeIn()</a></span>, 
                        <span class="highlight"><a href="https://api.jquery.com/fadeOut/">fadeOut()</a></span>, 
                        <span class="highlight"><a href="https://api.jquery.com/fadeToggle/">fadeToggle()</a></span>.
                    </li>
                    <li>
                        Afficher, cacher ou inverser un élément avec l'effet <b>slide</b> : 
                        <span class="highlight"><a href="https://api.jquery.com/slideDown/">slideDown()</a></span>, 
                        <span class="highlight"><a href="https://api.jquery.com/slideUp/">slideUp()</a></span>, 
                        <span class="highlight"><a href="https://api.jquery.com/slideToggle/">slideToggle()</a></span>.
                    </li>
                    <li>
                        Animer un élément :
                        <span class="highlight"><a href="https://api.jquery.com/animate/">animate()</a></span>.
                    </li>
                </ul>
            </div><!-- Fin box3 -->
        </div>
    </div><!-- Fin box1 -->
</div>