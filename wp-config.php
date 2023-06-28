<?php
/***********************************************************************************/
/* WARNING:                                                                        */
/* The wp-config.php file is automatically generated by Flywheel. You will not be  */
/* able to edit this file yourself. Defines needed for plugins can be added to a   */
/* php file in your wp-content/mu-plugins directory. If you need to add defines    */
/* for core WordPress functionality, please contact Flywheel support at            */
/* help@getflywheel.com.                                                           */
/***********************************************************************************/

define('FLYWHEEL_CONFIG_DIR', dirname(__FILE__) . '/flywheel-config');
define('FLYWHEEL_PLUGIN_DIR', FLYWHEEL_CONFIG_DIR . '/plugins');
define('FLYWHEEL_DEFAULT_PROTOCOL', 'https://');
define('WP_PLUGIN_DIR', dirname(__FILE__) . '/wp-content/plugins');
define('WPMU_PLUGIN_DIR', dirname(__FILE__) . '/wp-content/mu-plugins');
define('WPMU_PLUGIN_URL', '/wp-content/mu-plugins');
define('FS_METHOD', 'direct');
define('WP_POST_REVISIONS',  10);
define('WP_MEMORY_LIMIT', '128M');


/****************************************************************************/
/*                           Domain Configuration                           */
/****************************************************************************/
if ( !(defined('WP_CLI') && WP_CLI) ) {
    define('WP_SITEURL', FLYWHEEL_DEFAULT_PROTOCOL . 'outofcomfortzone.net');
    define('WP_HOME', FLYWHEEL_DEFAULT_PROTOCOL . 'outofcomfortzone.net');
}




/****************************************************************************/
/*                         Database Configuration                           */
/****************************************************************************/
define('DB_NAME', 'db9678661025');
define('DB_USER', 'fw6669952168');
define('DB_PASSWORD', 'Cu1cE5lPNQSaDpAz7IvckwI19BHiTp');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix  = 'wp_';


/****************************************************************************/
/*                          Plugin Configuration                            */
/****************************************************************************/




/****************************************************************************/
/*                             WordPress Salts                              */
/****************************************************************************/
define('AUTH_KEY',          '(]xUbPwwEJwV},OOSsRQT5#=Y*h)qocR_f<b*??U`prR}n7CbWV`0BdK0XPUvXI$');
define('SECURE_AUTH_KEY',   'j[c}kJ{xm61YS,rTOGWFT`uuuoB??JuHvbuA0`t{II}.7r$#kdo1RSH.3qX^ybCZ');
define('LOGGED_IN_KEY',     '&0}E#iFiMa1e.p={i<SaW_c[|ah*D*m4zJEpCW@8-vB.&8H5G3me_/<C}FLk@M]&');
define('NONCE_KEY',         'c4=n^ep3jO3#`B.]7fdt~U*Ol)Ti::IByn%aLwX^FrQ2M`(Z8Um;g^1B6`LZz28@');
define('AUTH_SALT',         ':8&|3!7N(H&}DE}&|,[{ZB^*74DgFCJ3kaZq+w7S$:g]:29JY}2&V)|wR(d[ME;x');
define('SECURE_AUTH_SALT',  'b=F^F?G%CUg-tFCO%Xh@5[0zKr|qge;zLQyKlsiB]-Z!)epI07ZTi:y;0L?K!/O>');
define('LOGGED_IN_SALT',    'NbW3R,18SS=u|II{~$MLVr7F&PQ3M+g+_HJxhwkraQ);ub+rm0s%F?o`$cg6bKHj');
define('NONCE_SALT',        '&80sw@/j}=Umqr?$vge&wAZR;u#n~x4<lC7t.HB+{jJThg)B6X4=]Q.@#[PJ=lXw');


/****************************************************************************/
/*                        General WordPress Settings                        */
/****************************************************************************/
define('WPLANG', '');
define('WP_DEBUG', false);
define('WP_CACHE', true);
define('WP_DEBUG_LOG', false);




/****************************************************************************/
/*                     Disable WordPress Auto-updates                       */
/*           http://getflywheel.com/flywheel-wordpress-3-7/                 */
/****************************************************************************/
define('WP_AUTO_UPDATE_CORE', false);


if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if ( array_key_exists('HTTP_X_FORWARDED_PROTO', $_SERVER) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' )
	$_SERVER['HTTPS']='on';



require_once(ABSPATH . 'wp-settings.php');
