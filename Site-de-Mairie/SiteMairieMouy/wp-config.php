<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'mairie1');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'PWYg_.t`p`d0u9l^x3%FxW}gqzS{z7@dJQtt;bKna00{JSG$)rre;aRvLzt` ^]^');
define('SECURE_AUTH_KEY',  'T[Nizta^C5n$0MY`i@ccj$F>u47,M4qsF;ggXPRY] jfI0lvknO.kr/T;973A}L<');
define('LOGGED_IN_KEY',    'J}CMx<Dd*GKAW>5o: N_IRMmDPuKlW*/sbK>uyX24leByZkBA1B:KH0g6a;u)y|g');
define('NONCE_KEY',        'Ym/4@9v%!G((;!xy@Vo(- w,2`dgT_-@tH$liCzl_KQ%6Qi.p<EjR_Bz:d r1d0Z');
define('AUTH_SALT',        'Q}%^&#QdM`YJfpe2ma7,SG`wm4#0Wg8^ie3#UX-m@^;v~V|x,>b*bCb[SV8K9I@S');
define('SECURE_AUTH_SALT', '!z{)]nGAR3ue8KEL5n5c:;Z!rT1ta}2~w]-Eu|M*VhXq;;z]]7gr;AoyynmIJ,`0');
define('LOGGED_IN_SALT',   'Q.ryuzXrBW9_~_lg?jw?aN1Z]vY?N~-m.bT {p&#vG!MW*$w GAxtvFX.a^*H!C,');
define('NONCE_SALT',       'es8>LK.hhr0J[~ca+AWTV[vu#6OoydFR1v;ObR4g)M<(lT}|RpK>[7:>DEfT3p#s');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'my_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');