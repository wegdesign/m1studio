<?php

$include_path = get_template_directory() . '/includes/';

//Header function
require_once $include_path . 'header-function.php';

//Theme Admin
require_once ($include_path . 'theme-admin.php');

//Theme Init
require_once ($include_path . 'theme-init.php');

//Theme Function
require_once ($include_path . 'theme-function.php');

//Theme Styles
require_once ($include_path . 'theme-styles.php');

//Theme Sidebar
require_once ($include_path . 'theme-sidebar.php');

//Theme Custom
require_once ($include_path . 'theme-custom.php');


//Theme Shortcode
require_once ($include_path . 'theme-shortcode.php');


?>