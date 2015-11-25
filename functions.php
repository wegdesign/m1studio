<?php

global $themeoptionsvalue, $meta_boxes;

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
?>