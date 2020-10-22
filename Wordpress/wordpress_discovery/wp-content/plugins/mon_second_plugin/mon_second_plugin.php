<?php
/*
Plugin Name: Mon second plugin
Plugin URI: https://mon-siteweb.com/
Description: On continu les cours sur les plugins !
Author: Framery Roy
Version: 1.0
Author URI: http://mon-siteweb.com/
*/

/*
A noter que lorsqu'un plugin utilise du CSS ou du JS par exemple, 
Il est préférable des les séparer de la racine du dossier
en créant un dossier CSS ou JS.
*/
// On va aller chercher le fichier contenant les fonctions du plugin
require_once plugin_dir_path(__FILE__).'includes/msp-functions.php';