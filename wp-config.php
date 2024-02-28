<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'test_technique' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         '=,22&f,^O_{yH}.FJ7vxoGYXl*Ws!}1tq-h?GKvVt?(4jJ$@Tmz2?k,fu&^,@yFa' );
define( 'SECURE_AUTH_KEY',  'W?PzVeKDgXw6EORkby8h%r4Y,NkC%yX9_r+FK<A0<R3ig,5$S%!3bzPlR`L#B-1X' );
define( 'LOGGED_IN_KEY',    'k{$Hrk7~?6G/g=j*^`rO2,(9Fg/tWM^-FZSE20~=d&)Ewfk-zj30$TPq6E]dLyqI' );
define( 'NONCE_KEY',        '38OaTb[rEEVvG/HBm]W8K}grFdGZ>7}llx*[@KuKTxk@T>qN{(m*w9,Cq(0&;yVo' );
define( 'AUTH_SALT',        'Z5itwu74${~_k}1d`4j~40*lWn+XYr]XAt4^cY@mX]r,jbdtHS[-rYG.1i:.z2+~' );
define( 'SECURE_AUTH_SALT', 'USu/ITR+pLd@Kr$1@UR)(i#J6]M5l-s(TPAwx L0-UHy8:W-4qhJI#X/sIviulOw' );
define( 'LOGGED_IN_SALT',   '(S6A0da!or`YWN9}M_|Hzjx/0s#w+Tkqipf~TP%B(!/ujqF=NrWg1uVYp~iXbHg0' );
define( 'NONCE_SALT',       '<k89c3I,3Sk?+oYKzC1c.J^]P8o 6jKVWd/NVJVa{Y]fnYXO1;3pXPx1AL.(pn&I' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'txt_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
