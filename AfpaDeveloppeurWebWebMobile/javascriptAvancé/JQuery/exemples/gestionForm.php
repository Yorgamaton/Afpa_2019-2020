<div class="wrapperGestionForm">

    <!-- box1 -->
    <div class="box1e">
        <h3>Gestion des formulaires </h3>
        <div class="wrapperGestionForm2">
            
            <!-- box2 -->
            <div class="box2e">
                <h3>1 - Récupérer ou changer la valeur d'un input dans un formulaire <a href="https://api.jquery.com/val/" target="_blank">Documentation</a></h3>
                <p>Pour cela, on va utiliser la méthode <span class="highlight">val()</span>.</p>
                <pre><code class="language-JS">// Lorsqu'on quitte le champ (perte du 'focus')
$("#champ").blur(function() 
{
    // Récupère la valeur saisie dans le champ input #champ     
    var valeur = $(this).val();                     
}); 

// Attribue la valeur au champ input #champ
$("#champ").val('Hello world');

// On peut bien sûr passer une variable  
var valeur = 'Hello world';  
$("#champ").val(valeur);</code></pre>
            </div><!-- Fin box2 -->
            
            <!-- box3 -->
            <div class="box3e">
                <h3>2- Vérifier un formulaire avant soumission</h3>
                <!-- TODO: Remplacer les alerts -->
                <pre><code class="language-JS">// HTML
<form action="#" method="post">
    <input type="text" name="prenom" id="prenom">
    <input type="button" name="btn_envoyer" id="btn_envoyer" value="Envoyer">
</form>

// JQuery
function verif() 
{     
     // Récupère la valeur saisie dans le champ input #prenom   
    var leprenom = $("#prenom").val();

     // Teste si la valeur est bonne
    if (leprenom === "") 
    {            
        alert("Le prénom doit être renseigné"); 
         return false; // le script s'arrête ici, ce qu'il y a après n'est pas exécuté
    }     

     // Même chose pour les autres champs, une fois ue le premier n'a pas renvoyé faux
    if (lenom === "") 
    {            
        alert("Le nom doit être renseigné"); 
        return false; 
    }     

    // Si aucun test n'a renvoyé faux, 
    // c'est qu'il n'y a pas d'erreurs
    // le script arrive ici, le formulaire est envoyé via submit()
    document.forms[0].submit();         
} 

$("#btn_envoyer").click(function(event) 
{
    /* On doit bloquer l'èvènement par défaut - ici l'envoi du formulaire -
    * avec l'instruction preventDefault() 
    * le paramètre 'event' est un objet (nommé 
    * librement) représentant l'évènement
    */         
    event.preventDefault();

    // Appel de la fonction verif()
    verif();        
}); </code></pre>

                <h3>Autres méthodes : <a href="https://www.pierre-giraud.com/jquery-apprendre-cours/inserer-deplacer-element-dom/">Documentation</a></h3>
            </div><!-- Fin box3 -->
                
        </div>
    </div><!-- Fin box1 -->
</div>