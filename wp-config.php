<?php
# Database Configuration
define( 'DB_NAME', 'wp_summitcountys1' );
define( 'DB_USER', 'homestead' );
define( 'DB_PASSWORD', 'secret' );
define( 'DB_HOST', '10.0.2.2' );
# define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '@R%!FwSq>LW_zFQmH_4ZA([3NOr#|@2j+|4W=|e$32yRIJYjZJ-vb{CLd$^W[4OS');
define('SECURE_AUTH_KEY',  '2Hm)|U</@zbOoj,X{R%n%yURYR5(gf+3v3JHk( La=7>]y*~JLEIx0tL;JIJNyJ=');
define('LOGGED_IN_KEY',    '#4E:vJkL-eJnc+k9E~;<51n%@AN$o1,?7@R61[12%3MKsD~Rhc+kT>I<bda+Sc>5');
define('NONCE_KEY',        'nybQ$e6ZE*jfFpM}hJ@{`<]v/CGs&nQgfWZP4%v5+.RG4gKM)_}J#`r:?,0Ak.J,');
define('AUTH_SALT',        'y0u8l0uiOh2M7.<)6h%=S+,!8IiA*q$.**MoUivVC0rs olz%bR2mb@>I/|c:?L|');
define('SECURE_AUTH_SALT', 'pXH5+ExF/fzmaFzd@ZUIyFktzSVBS+B8w>}CXgR9H4*|!3BHIoz$YFnP)C$A<v3Y');
define('LOGGED_IN_SALT',   'SN`thT(=8cu+B#hs[hM[$*Eg%ecR]+<A_B5I3#P8-,j2VuOhjmXg|L,7>K P|TU;');
define('NONCE_SALT',       'kye+`:I@Y<jn$z:QpIP$>A^&3p!P@3W-i|*6!q|a-(qOzEIGVn,Jo-C}PPVAE<O_');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'summitcountys1' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', '1ac853a930678daf6b59d6145b8ae5d8733b81f4' );

define( 'WPE_CLUSTER_ID', '100255' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'summitcountys1.wpengine.com', 1 => 'summitcountys1.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => 'pod-100255', );

$wpe_special_ips=array ( 0 => '146.148.102.184', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
