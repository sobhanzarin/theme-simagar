<?php
define("SIMAGAR_THEME_DIR", get_theme_file_path() . '/');
define("SIMAGAR_THEME_URL", get_theme_file_uri() . '/');
require_once(SIMAGAR_THEME_DIR . 'inc/codestar/codestar-framework.php');
require_once(SIMAGAR_THEME_DIR . 'inc/simagar-setting.php');
require_once(SIMAGAR_THEME_DIR . 'inc/post-type/header.php');
require_once(SIMAGAR_THEME_DIR . 'inc/post-type/footer.php');
require_once(SIMAGAR_THEME_DIR . 'inc/post-type/mega-menu.php');
require_once(SIMAGAR_THEME_DIR . 'inc/elementor/simagar-elementor.php');
require SIMAGAR_THEME_DIR . 'inc/simagar-assets.php';