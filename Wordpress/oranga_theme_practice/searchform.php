<div class="col d-flex justify-content-end">
    <form class="form-inline my-2 my-lg-0" action="<?= esc_url(home_url('/')); ?>">
    <!-- 
        esc_url() permet d'échaper les URL
        home_url() Fonction qui permet de générer le chemin à partir de la page d'accueil 
    -->
        <input class="form-control mr-sm-2" name="s" type="search" placeholder="Recherche" aria-label="Search" value="<?= get_search_query(); ?>"> 
        <!-- get_search_query(); permet de récupérer ce qui est tapé dans la barre de recherche 
        Ici pas besoin d'échapper le résultat de la recherche pusque la fonction le fait déjà avec la fonction esc_attr()-->
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
</div>