<?php
/*
Plugin Name: Base Structure Plugin
Plugin URI: https://realtyna.net
Description: This is just a test to check how does this MVC framework get things done and how optimized it is
Version: 1.0.0
Author: Realtyna
Author URI: mailto:info@realtyna.net
License:
License URI:
Text Domain: raeltyna-test-mvc
Domain Path: /assets/langs
Requires PHP: 7.4
*/

use Realtyna\MvcCore\Config;

require_once(__DIR__ . '/vendor/autoload.php');

$config = include(plugin_dir_path(__FILE__) . '/app/Config/config.php');
$config = new Config($config);
$main   = new \Realtyna\MustRename\Main($config);

register_activation_hook(__FILE__, [$main, 'activation']);
register_deactivation_hook(__FILE__, [$main, 'deactivation']);
register_uninstall_hook(__FILE__, [$main, 'uninstallation']);

