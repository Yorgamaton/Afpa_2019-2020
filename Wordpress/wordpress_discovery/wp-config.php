<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les r�glages de configuration suivants : r�glages MySQL,
 * pr�fixe de table, cl�s secr�tes, langue utilis�e, et ABSPATH.
 * Vous pouvez en savoir plus � leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C�est votre h�bergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilis� par le script de cr�ation de wp-config.php pendant
 * le processus d�installation. Vous n�avez pas � utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** R�glages MySQL - Votre h�bergeur doit vous fournir ces informations. ** //
/** Nom de la base de donn�es de WordPress. */
define( 'DB_NAME', 'jarditou' );

/** Utilisateur de la base de donn�es MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de donn�es MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l�h�bergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caract�res � utiliser par la base de donn�es lors de la cr�ation des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de donn�es.
  * N�y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Cl�s uniques d�authentification et salage.
 *
 * Remplacez les valeurs par d�faut par des phrases uniques !
 * Vous pouvez g�n�rer des phrases al�atoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secr�tes de WordPress.org}.
 * Vous pouvez modifier ces phrases � n�importe quel moment, afin d�invalider tous les cookies existants.
 * Cela forcera �galement tous les utilisateurs � se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'hcyb6l%[HHmd-21HY0N>5jRY?WM*yw|vva.3B_9Ev1phJMkx:R~3IaUj^,1vRLuQ' );
define( 'SECURE_AUTH_KEY',  'h/6A9 (*O,ETc&<F DK/#p?D!kV<f-D+,A5&Mgosd^6*~8$95(>yI36i%|NJcWPF' );
define( 'LOGGED_IN_KEY',    'ChRcyBa,=%?4$Y^=?>R-`0`>nqS=7z9uw0jt|;8Z=3r++TWT3MVp!R-GM,cn:zwZ' );
define( 'NONCE_KEY',        'd!/hCbAL>pHiv ,& puV;Q-Bwz>lrQEp{<2vI8Gd@Sf=}wel=_->_u+T?s%`yZGC' );
define( 'AUTH_SALT',        'nL_Ss.gFrk~*HZi=XDY!{An2}ba~ wi-RRG[eMct}{eRx[smaXi6AEUhrvTL|s-s' );
define( 'SECURE_AUTH_SALT', '0ZWpDZ]dinDMP_XB7q:m<mJUdI1f$TT}r7Km8i?-z>UVS550d L2d8I3>`I(:cxU' );
define( 'LOGGED_IN_SALT',   'SM(Wb#7.kQi>Dd4[7hbvOZ8_OfjoLTp794v,^NY#UfK8{QC@G*Rp<o36o,t$6J<f' );
define( 'NONCE_SALT',       '9FsWk&[#Tr% nfqter5vtuup_!{e5JZSx%{p4*NUNy.,{L:`PFjt2.321ckpz63P' );
/**#@-*/

/**
 * Pr�fixe de base de donn�es pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de donn�es
 * si vous leur donnez chacune un pr�fixe unique.
 * N�utilisez que des chiffres, des lettres non-accentu�es, et des caract�res soulign�s !
 */
$table_prefix = 'wp_';

/**
 * Pour les d�veloppeurs : le mode d�boguage de WordPress.
 *
 * En passant la valeur suivante � "true", vous activez l�affichage des
 * notifications d�erreurs pendant vos essais.
 * Il est fortemment recommand� que les d�veloppeurs d�extensions et
 * de th�mes se servent de WP_DEBUG dans leur environnement de
 * d�veloppement.
 *
 * Pour plus d�information sur les autres constantes qui peuvent �tre utilis�es
 * pour le d�boguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C�est tout, ne touchez pas � ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** R�glage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');