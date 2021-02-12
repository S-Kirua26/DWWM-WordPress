<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpressPlugin' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'NMK;b.-A5p/.$+-Z;m~_&!@774wITFceQqKN+Xp;HS?IcJMi2C4%(t7Nx(V4K>cF' );
define( 'SECURE_AUTH_KEY',  'puLg2%*]6b]aQivmA[q5o)f0;^P0LIDR~c0enu]>Un~e%QB0.@%bsrb@.2DV3rjD' );
define( 'LOGGED_IN_KEY',    'J+ 4n@$%.i,8.b!D>CHq^e*=dcV8o/f/I|PE>YH-e~rfiGq7<3C?Q|ruA65y`mXk' );
define( 'NONCE_KEY',        'CA$O<^krh1fA(<.tss!Ep~%cYy2c/~TY~ ?dUq~X7ucBMX`wLO8me1ZyW3-N_)i1' );
define( 'AUTH_SALT',        ')bV(%8-0JF*m6f7T8$rA0Tu:gzd@K?Ha#MU]<K`FCxtP;*MDE/lv:$yXB>X4c*lc' );
define( 'SECURE_AUTH_SALT', 'hd]fR`m8)p0?%q&b3EM]=SwXC#40qfBBF^fCc|-O@;yy0os{o JzK_JR#3?1+(fT' );
define( 'LOGGED_IN_SALT',   '0eZl5~WV9+1Qb-cfQn(2DY Vlc,Y6-w=;5cS[ Wc]a( 6H|OdBnFP^[gNzE3@3Xr' );
define( 'NONCE_SALT',       'T@]D!4%iG)Pggl+8S-F%KG/Qcc cyZ>7ji^26pn[Y<G:TO;/tdZ >Qn?<xdvkc^0' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
