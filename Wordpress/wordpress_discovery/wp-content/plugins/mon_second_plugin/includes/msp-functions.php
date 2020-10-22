<?php 
// here we will have all functions about the plugin


/*
* Add my new menu to the Admin Control Panel (ACP)
* Ajouter mon novueau menu au tableau de bord admin
*/

// Hook the 'admin_menu' action hook, run the function named 'mfp_Add_My_Admin_Link()'
add_action( 'admin_menu', 'msp_Add_Admin_Link' );

// Add a new top level menu link to the ACP
function msp_Add_Admin_Link()
{
    add_menu_page( // cette fonction nécessite 4 arguments et permet d'ajouter une élément dans le menu administrateur
        'My First plugin\'s Page', // Title of the page
        'My First Plugin', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        plugin_dir_path(__FILE__).'/msp-first-acp-page.php'  // The 'slug' - file to display when clicking the link
    ); 
}