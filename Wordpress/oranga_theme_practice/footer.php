        <footer>
            <div class="row">
                <div class="col-12">
                    <nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark my-3">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
            
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'    => 'footer',
                                    'depth'             => 5,
                                    'menu_class'        => 'nav navbar-nav',
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker()
                                )
                            );
                            ?>
                        </div><!-- .collapse -->
                    </nav>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </footer>
    </div> <!-- .container -->



    <!-- Je charge les script de bootstrap dans le fichier functions.php -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script></body> -->
    <?php wp_footer(); ?>
</body>

</html>