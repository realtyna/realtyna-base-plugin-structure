<?php

namespace Realtyna\MustRename;

use Realtyna\MustRename\Settings\Setting;
use Realtyna\MvcCore\Phinx;
use Realtyna\MvcCore\StartUp;

class Main extends StartUp
{

    public function init()
    {
        // TODO: Implement init() method.
    }

    public function components()
    {
        // TODO: Implement components() method.
    }

    public function onAdmin()
    {
        // TODO: Implement onAdmin() method.
    }

    public function api()
    {
        // TODO: Implement api() method.
    }

    public function settings()
    {
        $this->addSetting(Setting::class);
    }

    public function listeners(): array
    {
        return [

        ];
    }

    public function requirements(): bool
	{
		$valid = true;
		if ( !is_plugin_active( 'realtyna-API/plugin.php' ) ) {
			$this->addNotice('<p><strong>Realtyna API plugin</strong> is not activated. you need to install and activate it.</p>');
			$valid = false;
		}
		return $valid;
	}

    public function activation()
    {
        $this->container->get(Phinx::class)->migrate();
        $this->container->get(Phinx::class)->seed();
        $pluginVersion = get_plugin_data($this->config->get('path.plugin-file-path'))['Version'];
        update_option('realtyna_must_rename_version', $pluginVersion);


        //Custom activation START
        //Custom activation END
    }

    public function deactivation()
    {

        //Custom deactivation START
        //Custom deactivation END
    }

    public function uninstallation()
    {
        $this->container->get(Phinx::class)->rollback();

        //Custom uninstallation START
        //Custom uninstallation END
    }

    public function onUpdate()
    {
        if (!function_exists('get_plugin_data')) {
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }

        $currentPluginVersion = get_plugin_data($this->config->get('path.plugin-file-path'))['Version'];
        $lastRegisteredPluginVersion = get_option('realtyna_must_rename_version');

        if ($currentPluginVersion != $lastRegisteredPluginVersion) {
            $this->container->get(Phinx::class)->migrate();
            $this->container->get(Phinx::class)->seed();
            update_option('realtyna_must_rename_version', $currentPluginVersion);
        }
    }
}