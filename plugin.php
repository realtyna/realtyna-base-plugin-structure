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

if(file_exists(plugin_dir_path(__FILE__) . '../realtyna-API/vendor/autoload.php')){
	require_once plugin_dir_path(__FILE__) . '../realtyna-API/vendor/autoload.php';
}else{
	add_action('admin_notices', function (){
		echo  '<div class="notice notice-error">';
		echo '<p>Realtyna API is not installed.</p>';
		echo  '</div>';
	});
}

if (!defined('REALTYNA_JWT_SECRET')) {
	$html = '<div class="notice notice-error"><p>
                    <strong>REALTYNA_JWT_SECRET</strong> is not defined in <strong>wp-config.php</strong>.
                    We will define a token for you but keep it in mind for better security you need 
                    to define it in <strong>wp-config.php</strong> like so:
<pre>
define("REALTYNA_JWT_SECRET", "YOUR RANDOM SECRET TOKEN")                    
</pre>
                    (Token can be anything, example: ' . bin2hex(random_bytes(18)) . ')
                </p></div>';
	add_action('admin_notices', function () use($html) {
		echo $html;
	});
	// Create a raw binary sha256 hash and base64 encode it.
	$hash_base64 = base64_encode(hash('sha256', $_SERVER['SERVER_NAME'], true));
	// Replace non-urlsafe chars to make the string urlsafe.
	$hash_urlsafe = strtr($hash_base64, '+/', '-_');
	// Trim base64 padding characters from the end.
	$hash_urlsafe = rtrim($hash_urlsafe, '=');
	// Shorten the string before returning.
	$hash = substr($hash_urlsafe, 0, 50);

	define('REALTYNA_JWT_SECRET', $hash);
}

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


