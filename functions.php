<?php
define( 'THEME_URI', get_template_directory_uri());
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_JS', THEME_URI . '/js' );
define( 'THEME_CSS', THEME_URI . '/css' );
define( 'THEME_PLUGINS', THEME_DIR . '/plugins/' );
define( 'THEME_PLUGINS_URI', THEME_URI . '/plugins/' );

define( 'THEME_INCLUDE', THEME_DIR . '/includes/' );
define( 'THEME_POST_TYPE', THEME_INCLUDE . '/post-type/' );
define( 'THEME_META_BOX', THEME_INCLUDE . '/meta-box/' );
define( 'THEME_TEMPLATE', THEME_INCLUDE . '/template/' );

//Header function
require_once (THEME_INCLUDE . 'header-function.php');

//Theme Admin
require_once (THEME_INCLUDE . 'theme-admin.php');

//Theme Init
require_once (THEME_INCLUDE . 'theme-init.php');

//Theme Function
require_once (THEME_INCLUDE . 'theme-function.php');

//Theme Styles
require_once (THEME_INCLUDE . 'theme-styles.php');

//Theme Sidebar
require_once (THEME_INCLUDE . 'theme-sidebar.php');

//Theme Custom
require_once (THEME_INCLUDE . 'theme-custom.php');

//Theme Manu
require_once (THEME_INCLUDE . 'theme-menu.php');

//Theme Shortcode
require_once (THEME_INCLUDE . 'theme-shortcode.php');


//Theme Plugins
require_once (THEME_INCLUDE . 'theme-plugins.php');


//Theme Scripts
require_once (THEME_INCLUDE . 'theme-scripts.php');

//Theme Meta Box
//require_once (THEME_INCLUDE . 'theme-metabox.php');



?>