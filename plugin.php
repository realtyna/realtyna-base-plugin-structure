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

if(!class_exists('Realtyna\MvcCore\StartUp')){
	add_action('admin_notices', function (){
		echo  '<div class="notice notice-error">';
		echo '<p>Realtyna API is not installed</p>';
		echo  '</div>';
	});
	return ;
}


use Realtyna\MvcCore\Config;

require_once(__DIR__ . '/vendor/autoload.php');

define('REALTYNA_MUST_RENAME_BASE_PATH', plugin_dir_path(__FILE__));

$config = include(plugin_dir_path(__FILE__) . '/app/Config/config.php');
$config = new Config($config);
$pluginName = $config->get('plugin.name');
global $$pluginName;
$$pluginName   = new \Realtyna\MustRename\Main($config);

register_activation_hook(__FILE__, [$$pluginName, 'activation']);
register_deactivation_hook(__FILE__, [$$pluginName, 'deactivation']);
register_uninstall_hook(__FILE__, [$$pluginName, 'uninstallation']);


